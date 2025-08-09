<?php
// Start a session (if needed)
session_start();

// Database connection (Modify with your database credentials)
$host = "localhost"; // Your database host
$user = "root"; // Your database username
$password = ""; // Your database password
$dbname = "careconnect_db"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get doctor ID from URL
if (isset($_GET['id'])) {
    $doctor_id = intval($_GET['id']);

    // Fetch doctor details from the database
    $sql = "SELECT * FROM doctors WHERE doctor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $doctor = $result->fetch_assoc();
    } else {
        echo "<p>Doctor not found.</p>";
        exit;
    }

    $stmt->close();
} else {
    echo "<p>No doctor ID provided.</p>";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Doctor Details - <?php echo htmlspecialchars($doctor['name']); ?></title>
    <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap" />
    <link rel="stylesheet" href="detail.css" />
    <style>
        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="rectangle">
            <div class="group"></div>
            <div class="logo">
                <span class="careconnec">careconnec</span><span class="t">t</span>
                <span class="empty-space"> </span>
            </div>
            <a href="home.php" class="about-us">about us</a>
            <a href="treatments.php" class="treatment">treatment</a>
            <a href="doctor.php" class="providers">providers</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="login-sign-up">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-sign-up">login/sign-up</a>
            <?php endif; ?>
        </div>

        <div class="mask-group"></div>
        <span class="logo-1"><?php echo htmlspecialchars($doctor['name']); ?></span>

        <div class="flex-row-ff">
            <div class="frame"></div>
            <span class="experience"><?php echo htmlspecialchars($doctor['years_experience']); ?> year(s) of experience</span>
        </div>

        <div class="rectangle-2">
            <div class="flex-row-db">
                <div class="line"></div>
                <div class="frame-3"></div>
                <span class="deshpande-dental"><?php echo htmlspecialchars($doctor['clinic_name']); ?></span>
                <div class="frame-4"></div>
                <span class="tanya-email-bds">
                    <?php echo htmlspecialchars($doctor['email']); ?><br /><br />
                    <?php echo htmlspecialchars($doctor['education']); ?><br /><br />
                </span>
                <span class="contact_no">
                    <?php echo htmlspecialchars($doctor['contact_number']); ?><br />
                </span>
                <div class="frame-5"></div>
                <span class="address-info">
                    <?php echo nl2br(htmlspecialchars($doctor['address'])); ?><br /><br/>
                    <?php echo htmlspecialchars($doctor['working_days']); ?> <br /> <?php echo htmlspecialchars($doctor['working_hours']); ?>
                </span>
                <div class="frame-6"></div>
            </div>
            <div class="flex-row">
                <span class="schedule">Schedule</span>
                <div class="frame-7"></div>
            </div>

            <!-- Book Appointment Button -->
            <div class="book-appointment-container">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <button id="bookAppointmentButton" class="book-appointment-button">Book Appointment</button>
                <?php else: ?>
                    <a href="login.php" class="book-appointment-button">Login to Book</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Modal for booking appointment -->
    <div id="appointmentModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Book Appointment with <?php echo htmlspecialchars($doctor['name']); ?></h2>
            <form action="process_booking.php" method="post">
                <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>">
                <div>
                    <label for="patient_name">Name:</label>
                    <input type="text" id="patient_name" name="patient_name" required>
                </div>
                <div>
                    <label for="patient_email">Email:</label>
                    <input type="email" id="patient_email" name="patient_email" required>
                </div>
                <div>
                    <label for="appointment_date">Date:</label>
                    <input type="date" id="appointment_date" name="appointment_date" required>
                </div>
                <div>
                    <label for="appointment_time">Time:</label>
                    <input type="time" id="appointment_time" name="appointment_time" required>
                </div>
                <button type="submit">Confirm Appointment</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("appointmentModal");

        // Get the button that opens the modal
        var btn = document.getElementById("bookAppointmentButton");

        // Get the <span> element that closes the modal
        var span = document.getElementById("closeModal");

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
