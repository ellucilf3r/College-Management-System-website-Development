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
	<title>Student MainPage</title>
	<link rel="stylesheet" href="style3.css">
</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmLoginStud.php">
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
    <h1>STUDENT MAINPAGE</h1>
    <div class="content">
    <table>
    	<tr>
    	<td>
    		<div class="icons1">

            <a href="frmStudInfo.php">
                <img src="image/stdInfo.png" alt="Student Information" width="200" height="200">
            </a>
            <a href="frmStudFee.php">
                <img src="image/stdFee.png" alt="Student Fee" width="200" height="200">
            </a>
        </div>

        <div class="icons2">

            <a href="frmStudRoom.php">
                <img src="image/stdRoom.png" alt="Student Room" width="200" height="200">
            </a>
            <a href="frmStudFeed.php">
                <img src="image/stdFeedback.png" alt="Student Feedback" width="200" height="200">
            </a>
        </div>
    	</td>

    	<td>
	    <div class="image">
	    		<img src="image/stdMain.jpg" alt="Std Main Page">
	    </div>
		</td>
		</tr>
	</table>
	</div>
</body>
</html>