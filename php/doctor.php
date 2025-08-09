<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Providers - careconnect</title>
    <link rel="icon" type="image/png" href="./home/images/b93b4a76-d183-4ce8-b039-f08e2c3a8b40.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" />
  <link rel="stylesheet" href="doctor.css" />
</head>

<body>
  <div class="main-container">
    <div class="rectangle">
      <div class="group"></div>
      <div class="logo">
        <span class="careconnec">careconnec</span><span class="t">t</span>
        <span class="empty-space"> </span>
      </div>
        <a href="treatments.php" class="treatment">treatment</a>
        <a href="home.php" class="about-us">about us</a>
        <a href="doctor.php" class="providers">providers</a>
        <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="login-sign-up">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-sign-up">login/sign-up</a>
            <?php endif; ?>
    </div>
    <span class="healthcare-providers">Healthcare Providers</span>
    <div class="rectangle-1">
      <div class="line"></div>
      <input type="text" id="doctorSearch" placeholder="Search for doctor, clinic, hospital or location" />
      <div class="frame"></div>
      <div class="frame-2"></div>
    </div>
    <button id="srchbutton"><span class="frame-4">Search</span></button>
    <br><br>

    <div id="doctorResults" class="doctor-results"></div> <!-- Added to display search results -->

    <script>
    document.getElementById("srchbutton").addEventListener("click", function() {
        let query = document.getElementById("doctorSearch").value;
        console.log("Search query:", query); // Log the search query

        // Check if user is logged in (this value should be set dynamically from PHP)
        let isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

        if (!isLoggedIn) {
            alert("You must have an account to avail this service.");
            return; // Stop further execution
        }

        fetch(`./search_doctors.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                console.log("Data received:", data); // Log the data received

                let resultHTML = "<h2 class='search-results-title'>Search Results</h2><div class='flex-row-d'>"; // Changed to use a div for alignment

                data.forEach(doctor => {
                    resultHTML += `
                        <div class="doctor-box"> 
                            <div class="mask-group"></div>
                            <span class="dr-tanya-deshpande">${doctor.name}</span>
                            <span class="details"><a href="detail.php?id=${doctor.doctor_id}">Details</a></span>
                            <span class="dentist-bds-mds">${doctor.specialization}<br><br>${doctor.education}<br /><br /></span>
                            <span class="contact_no">${doctor.contact_number}<br /></span>
                            <div class="frame-6"></div>
                            <div class="frame-7"></div>
                            <div class="frame-8"></div>     
                        </div>
                    `;
                });

                resultHTML += "</div>"; // Closing div for flex-row-d
                document.getElementById("doctorResults").innerHTML = resultHTML;
            })
            .catch(error => console.error("Error fetching data:", error));
    });
</script>


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
