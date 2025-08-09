<?php
session_start();
require('fpdf.php'); // Make sure fpdf.php is in the same directory

$host = "localhost";
$user = "root";
$password = "";
$dbname = "careconnect_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to book an appointment.");
}

$user_id = $_SESSION['user_id'];
$doctor_id = intval($_POST['doctor_id']);
$patient_name = $_POST['patient_name'];
$patient_email = $_POST['patient_email'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];

// Insert appointment into database
$sql = "INSERT INTO appointments (doctor_id, user_id, patient_name, patient_email, appointment_date, appointment_time) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iissss", $doctor_id, $user_id, $patient_name, $patient_email, $appointment_date, $appointment_time);

if ($stmt->execute()) {
    // Get the doctor's name for the receipt
    $doctor_query = $conn->prepare("SELECT name FROM doctors WHERE doctor_id = ?");
    $doctor_query->bind_param("i", $doctor_id);
    $doctor_query->execute();
    $doctor_result = $doctor_query->get_result();
    $doctor_row = $doctor_result->fetch_assoc();
    $doctor_name = $doctor_row['name'];
    $doctor_query->close();
    
    // Custom PDF class to include header
    
    class PDF extends FPDF {
        function Header() {
            // Set font before using Cell()
            $this->SetFont('Times', 'B', 14);
    
            // Corrected image path (use relative or absolute with double backslashes)
            $imagePath = "./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png";
    
            // Check if file exists before using it
            if (file_exists($imagePath)) {
                $this->Image($imagePath, 175, 4, 22,); // Adjust path and size
            }
    
        }
    }
    
    // Use the custom PDF class
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Times', 'B', 16);
    $pdf->Cell(0, 10, "Appointment Confirmation", 0, 1, 'C');
    $pdf->Cell(0, 10, "", 0, 1, 'C');
    $pdf->SetFont('Times', '', 12); 
    $pdf->Cell(0, 10, "Dear " . $patient_name . ",", 0, 1);
    $pdf->Cell(0, 10, "Your appointment with " . $doctor_name . " is scheduled on " . $appointment_date . " at " . $appointment_time . ".", 0, 1);
    $pdf->Cell(0, 10, "Email: " . $patient_email, 0, 1);
    $pdf->Cell(0, 10, "Thank you for booking!", 0, 1,);
    
    $file_name = "appointment_receipt.pdf";
    $pdf->Output("D:/xamp/htdocs/Careconnect/pdf/" . $file_name, "F"); // Save PDF
    
    echo "Appointment booked successfully. <a href='../pdf/$file_name' download>Download Receipt</a>";
    
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
