<?php
header("Content-Type: application/json");
$conn = new mysqli('localhost', 'root', '', 'careconnect_db');

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}

// Get search query
$search = isset($_GET['query']) ? "%" . $conn->real_escape_string($_GET['query']) . "%" : "%";

// SQL query to search across all relevant columns
$sql = "SELECT * FROM doctors WHERE 
    name LIKE ? OR 
    specialization LIKE ? OR 
    education LIKE ? OR 
    contact_number LIKE ? OR 
    years_experience LIKE ? OR 
    email LIKE ? OR 
    clinic_name LIKE ? OR 
    address LIKE ? OR 
    working_days LIKE ? OR 
    working_hours LIKE ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die(json_encode(["error" => "Failed to prepare statement"]));
}

// Bind parameters (all as strings since LIKE works with strings)
$stmt->bind_param("ssssssssss", $search, $search, $search, $search, $search, $search, $search, $search, $search, $search);

$stmt->execute();
$result = $stmt->get_result();

$doctors = [];
while ($row = $result->fetch_assoc()) {
    $doctors[] = $row;
}

echo json_encode($doctors);

$stmt->close();
$conn->close();
?>
