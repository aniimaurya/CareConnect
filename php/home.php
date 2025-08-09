<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home - careconnect</title>
    <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jim+Nightshade&family=Lavishly+Yours&family=Quintessential&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="home.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="rectangle">
      <?php if (isset($_SESSION['user_id'])): ?>
                <span class="user-id"><?php echo "Hello " ; echo $_SESSION['user_name']; echo " !! " ?></span>
            <?php endif; ?>
        <!-- <button class="button-frame">
          <span class="book-free-appointment">Book Free Appointment</span>
        </button> -->
      </div>
      <div class="flex-row-cb">
        <div class="group"></div>
        <div class="logo">
          <span class="careconnec">careconnec</span><span class="t">t</span>
          <span class="empty-space"> </span>
        </div>
        <a href="home.php" class="about-us">about us</a>
        <a href="treatments.php" class="treatment"> Treatment </a>
        <a href="doctor.php" class="providers"> providers </a>
        <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="login-sign-up">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-sign-up">login/sign-up</a>
            <?php endif; ?>
      </div>
      <div class="flex-row-ee">
        <div class="group-1"></div>
        <span class="healthcare-fingertips">healthcare at your fingertips</span>
        <span class="careconnect-description">
          We at careconnect aims to connect you with the best healthcare
          professionals across the nation.With our user-friendly platform, you
          can easily book appointments, access medical consultations, and
          receive personalized treatment plans from top-rated doctors. Your
          health is our priority, and we strive to ensure you have access to the
          best healthcare whenever you need it.
        </span>
      </div>
      <div class="rectangle-2">
        <span class="find-doctors-near-you">Find Doctors Near You</span>
        <div class="rectangle-3">
          <div class="line"></div>
          <input type="text" id="doctorSearch" placeholder="Search for doctor, clinic, hospital or location.." />         
          <div class="frame"></div>
          <div class="frame-4"></div>
        </div>
        <button id="srchbutton"><span class="search">Search</span>
        </button>
      </div>
      <div class="flex-row-b">
        <span class="accelerating-medical-procedure">
          How can careconnect assist you in accelerating medical procedure?
        </span>
        <div class="image"></div>
        <div class="image-6"></div>
      </div>
      <div class="rectangle-7">
        <div class="frame-8">
          <div class="background-complete">
            <div class="group-9">
              <div class="group-a"></div>
              <div class="group-b"></div>
              <div class="group-c"></div>
            </div>
            <div class="group-d">
              <div class="flex-row-d">
                <div class="vector"></div>
                <div class="vector-e"></div>
              </div>
              <div class="vector-f"></div>
              <div class="vector-10"></div>
              <div class="flex-row-e">
                <div class="vector-11"></div>
                <div class="vector-12"></div>
              </div>
              <div class="vector-13"></div>
              <div class="vector-14"></div>
              <div class="vector-15"></div>
            </div>
          </div>
          <div class="character">
            <div class="group-16"></div>
          </div>
          <div class="event-calendar">
            <div class="group-17"></div>
          </div>
        </div>
        <span class="span">
          careconnect: India's Best Patient Consulting & Appointment Portal
        </span>
        <span class="span-18">
          Welcome to Careconnect, India's premier patient consulting and
          appointment portal. At Careconnect, we are dedicated to providing the
          best healthcare experience for patients across the nation. Our
          user-friendly platform allows patients to easily connect with trusted
          healthcare providers, schedule appointments conveniently, and access
          top-notch medical services. Whether you're seeking expert medical
          advice or in need of a consultation, Careconnect is your go-to
          destination for seamless healthcare solutions. Join us today and
          experience the difference in patient care.
        </span>
      </div>
      <div id="doctorResults" class="doctor-results"></div> <!-- Added to display search results -->

      <script>
    document.getElementById("srchbutton").addEventListener("click", function() {
        let query = document.getElementById("doctorSearch").value.trim();

        // Check if the user is logged in
        let isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
            alert("You must have an account to avail this Service.");
            return;
        }

        if (query === "") {
            alert("Enter any relevant keyword.");
            return;
        }

        // Redirect the user to doctor.php with the search query
        window.location.href = `doctor.php?query=${encodeURIComponent(query)}`;
    });
</script>

      <div class="rectangle-19">
        <div class="flex-row-ed">
          <div class="group-1a"></div>
          <div class="logo-1b">
            <span class="span-1c">careconnec</span><span class="span-1d">t</span>
            <span class="span-1e"> </span>
          </div>
          <span class="span-1f">Follow us</span>
        </div>
        <div class="flex-row-c">
          <span class="span-20">Healthcare at your fingertips</span>
          <div class="group-21"></div>
          <div class="group-22"></div>
          <div class="group-23"></div>
          <div class="group-24"></div>
        </div>
        <div class="flex-row-d-25">
          <span class="about-us-26">about us</span>
          <span class="connect-us">Connect us</span>
        </div>
        <div class="flex-row-d-27">
          <span class="treatment-28">treatment </span>
          <span class="careconnect-email">careconnect@gmail.com</span>
        </div>
        <div class="flex-row-fea">
          <span class="providers-29">providers </span>
          <span class="phone-number">+91-8854675543</span>
        </div>
        <div class="flex-row">
          <span class="phone-number-2a">+91-7789755043</span>
          <span class="login-sign-up-2b">login/sign-up</span>
        </div>
        <div class="flex-row-af">
          <span class="text"> </span>
          <span class="copyright">© 2025 careconnect, Inc. All rights reserved.</span>
        </div>
      </div>
    </div>
    
  </body>
</html>
