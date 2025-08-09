
<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Treatments - careconnect</title>
    <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" />
  <link rel="stylesheet" href="treatment.css" />
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

    <br><br>
    <h1 style="color: #0E2449; text-align: center; font-family: outfit; text-transform: uppercase;">Treatment Options</h1>
    <br><br>

    <div class="treatment-list">
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100;">Laparoscopy</h2>
        <img src="global_images/laproscopy.jpg" alt="Laparoscopy" width="10%">
      </div>

      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Gynaecology</h2>
        <img src="global_images/gynaecology.jpg" alt="Gynaecology" width="10%">
      </div>
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">ENT</h2>
        <img src="global_images/ENT.jpg" alt="ENT" width="10%">
      </div>

      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Cardiology</h2>
        <img src="global_images/cardiology.jpg" alt="Cardiology" width="10%">
      </div>
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Dermatology</h2>
        <img src="global_images/dermatology.jpg" alt="Dermatology" width="10%">
      </div>
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Pediatrics</h2>
        <img src="global_images/pediatrics.jpg" alt="Pediatrics" width="10%">
      </div>
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Orthopedics</h2>
        <img src="global_images/orthopedics.jpg" alt="Orthopedics" width="10%">
      </div>

      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Psychiatry</h2>
        <img src="global_images/psychiatry.jpg" alt="Psychiatry" width="10%">
      </div>
      <div class="treatment-item">
        <h2 style="color: #0E2449; text-align: center; font-family: outfit; font-weight: 100">Neurology</h2>
        <img src="global_images/neurology.jpg" alt="Neurology" width="10%">
      </div>

      <br><br>
    </div>
    <div class="rectangle-3c">
      <div class="flex-row-ed">
        <div class="group-3d"></div>
        <div class="logo-3e">
          <span class="careconnect">careconnec</span><span class="t-3f">t</span>
          <span class="empty-space-40"> </span>
        </div>
        <span class="follow-us">Follow us</span>
      </div>
      <div class="flex-row-ab">
        <span class="healthcare-fingertips">Healthcare at your fingertips</span>
        <div class="group-41"></div>
        <div class="group-42"></div>
        <div class="group-43"></div>
        <div class="group-44"></div>
      </div>
      <span class="copyright">© 2025 careconnect, Inc. All rights reserved.</span>
    </div>
    <span class="text"> </span>
  </div>
</body>
</html>
