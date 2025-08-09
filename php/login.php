<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - careconnect</title>
    <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="main-container">
      <div class="flex-row-f">
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
      <div class="flex-row">
        <span class="login-1">Login </span>
        <div class="regroup">
          <div class="vector"></div>
          <div class="vector-2"></div>
        </div>
        <div class="vector-3">
          <div class="flex-column-db">
            <div class="group-4"></div>
            <div class="vector-5"></div>
            <div class="vector-6"></div>
          </div>
          <div class="group-7"></div>
        </div>
        <div class="vector-8"><div class="group-9"></div></div>
        <div class="group-a"><div class="vector-b"></div></div>
        <div class="group-c"></div>
        <div class="group-d"></div>
        <form action="/careconnect/php/loginVerify.php" method="POST">
          <div class="frame">
            <input class="frame-input" name="email" type="email" required placeholder="Email" />
          </div>
          <div class="group-e"></div>
          <div class="frame-f">
            <input class="frame-input-10" name="password" type="password" required placeholder="Password" />
          </div>
          <div class="group-11"></div>
          <div class="group-12"></div>
          <button class="button" type="submit"><span class="login-13">Login</span></button>
        </form>
        <span class="account-message">Doesn’t have an account ?</span>
        <span class="sign-up"><a href="signup.php"> Sign-up</a></span>
        <div class="vector-14"></div>
        <div class="vector-15"></div>
        <div class="vector-16"></div>
        <div class="vector-17">
          <div class="vector-18"></div>
          <div class="vector-19"></div>
        </div>
      </div>
      <div class="rectangle">
        <span class="copyright">© 2025 careconnect, Inc. All rights reserved.</span>
        <div class="flex-row-1a">
          <span class="follow-us">Follow us</span>
          <div class="white-logo"></div>
          <span class="logo-1b">careconnect </span>
          <div class="group-1c"></div>
          <div class="group-1d"></div>
          <div class="group-1e"></div>
          <div class="group-1f"></div>
        </div>
        <span class="healthcare-fingertips">Healthcare at your fingertips</span>
      </div>
    </div>
   
</html>
