<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign-up - careconnect</title>
  <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="signup.css" />
</head>

<body>
  <div class="main-container">
    <div class="flex-row-a">
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
      <div class="vector"></div>
    </div>

    <form id="signup-form" action="/careconnect/php/register.php" method="POST">
          <div class="button-frame" style="position: relative; top: 70px; left: 54.5%; background-color:#98b5cb; width:29%">
            <select id="user_type" class="frame-input" name="user_type" required>
              <option value="" disabled selected >Select Account Type</option>
              <option value="patient">I am a Patient</option>
              <option value="doctor">I am a Doctor</option>
            </select>
          </div>

    <div class="logo-1">
      <!-- <span class="create-account">Create Account</span>
      <span class="empty-space-2"> </span> -->
      
    </div>

    <div class="flex-row-a-3">
      <div class="vector-4">
        <div class="flex-column-ae">
          <div class="group-5"></div>
          <div class="vector-6"></div>
          <div class="vector-7"></div>
        </div>
        <div class="group-8"></div>
      </div>
      <div class="regroup">
        <div class="vector-9"></div>
        <div class="vector-a"></div>
      </div>
      <div class="vector-b">
        <div class="group-c"></div>
      </div>
      <div class="group-d">
        <div class="vector-e"></div>
      </div>


      <form action="/careconnect/php/register.php" method="POST">
        <div class="frame">
          <input class="frame-input" name="first_name" type="text" required placeholder="First Name" />
        </div>
        <div class="group-f"></div>
        <div class="frame-10">
          <input class="frame-input-11" name="last_name" type="text" required placeholder="Last Name" />
        </div>
        <div class="group-12"></div>
        <div class="group-13"></div>
        <div class="frame-14">
          <input class="frame-input-15" name="email" type="email" required placeholder="Email" />
        </div>
        <div class="group-16"></div>
        <div class="group-17"></div>
        <div class="frame-18">
          <input class="frame-input-19" name="password" type="password" required placeholder="Password" />
        </div>
        <button class="button-frame" type="submit">
          <span class="create-account-1a">Create Account</span>
        </button>
      </form>

      <div class="vector-1b"></div>
      <div class="vector-1c"></div>
      <div class="vector-1d"></div>
      <div class="vector-1e">
        <div class="vector-1f"></div>
        <div class="vector-20"></div>
      </div>
    </div>
    <div class="flex-row-f">
      <span class="already-have-account">Aready have an account?</span>
      <span class="login"><a href="login.php"> Login</a></span>
    </div>
    <div class="rectangle">
      <div class="flex-row-fa">
        <div class="group-21"></div>
        <div class="logo-22">
          <span class="careconnec-23">careconnec</span><span class="t-24">t</span><span class="empty-space-25"> </span>
        </div>
        <span class="follow-us">Follow us</span>
      </div>
      <div class="flex-row-bc">
        <span class="healthcare-fingertips">Healthcare at your fingertips</span>
        <div class="group-26"></div>
        <div class="group-27"></div>
        <div class="group-28"></div>
        <div class="group-29"></div>
      </div>
      <span class="all-rights-reserved">© 2025 careconnect, Inc. All rights reserved.</span>
    </div>
    <span class="text"> </span>

  </div>
  </div>

 <script>
  const userType = document.getElementById("user_type");
  const form = document.getElementById("signup-form");

  userType.addEventListener("change", () => {
    if (userType.value === "doctor") {
      form.action = "/careconnect/php/home.php";
    } else {
      form.action = "/careconnect/php/signup.php";
    }
  });
</script>


</body>

</html>