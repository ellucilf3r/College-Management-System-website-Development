<?php
session_start(); // Start the session at the top of the script

// You can access session variables here
// Example: Check if the user is logged in
if (!isset($_SESSION['studentId'])) {
    // Redirect to login page if not logged in
    header("Location: frmLoginStud.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Feedback</title>
	<link rel="stylesheet" href="style6.css">
</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmStudFee.php">
            <img src="image/backbutton.png" alt="Back Button" width="45" height="45">
          </a>
            <a href="aboutUs.html">About Us</a>            
        </div>
        <div class="rightFunction">
            <a href="frmLogout.php">Log Out</a>
            <a href="homePage.php">
            <img src="image/homeBtn.png" alt="Home Button" width="45" height="45">
            </a>
        </div>
      </div>
    </nav>
	<form name="frmStudFeed" method="POST" action="studFeed.php">
      <div class="form-stdFeed">
        <div style="display: flex; gap:20px; align-items:flex-start ;">
          <div style="flex: 1;">
            <img src="image/feedback.jpg" alt="Room Image" style="width: 700px; height: 640px; background-size: cover; margin-top: 10px;">
          </div>
          <div style="flex: 1; padding: 10px; display:flex; flex-direction: column; gap: 5px;">
          	<h1>FEEDBACK INFORMATION</h1>
          	<label for="student_ID" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Student ID:</label><br>
            <input type="text" id="stdID" name="stdID" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>

            <label for="feedback-type" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Feedback Type:</label><br>
            <input type="text" id="fType" name="fType" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>
            
            <label for="feedback-date" style="font-size: 14px; font-family: 'Norwester', sans-serif; font-weight: bold;">Feedback Date:</label><br>
            <input type="date" id="fDate" name="fDate" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>
            <div class="form-buttons">
        		<button type="reset" class="clear">CLEAR</button>
        		<button type="submit" class="save">SAVE</button>
      		</div>
          </div>
        </div>
      </div>
    </form>
	</section>
</body>
</html>