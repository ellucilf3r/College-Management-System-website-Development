<?php
session_start(); // Start the session at the top of the script

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Staff MainPage</title>
	<link rel="stylesheet" href="style3.css">
</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmLoginStf.php">
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
    <h1>STAFF MAINPAGE</h1>
    <div class="content">
    <table>
    	<tr>
    	<td>
    		<div class="icons1">

            <a href="frmSearchFee.php">
                <img src="image/fee.png" alt="Student's Fee" width="200" height="200">
            </a>
            <a href="frmSearchStud.php">
                <img src="image/stdInfo'.png" alt="Student' Information" width="200" height="200">
            </a>
        </div>

        <div class="icons2">

            <a href="frmSearchRoom.php">
                <img src="image/stdRoom'.png" alt="Student' Room" width="200" height="200">
            </a>
            <a href="frmSearchFeed.php">
                <img src="image/stdFeedback'.png" alt="Student' Feedback" width="200" height="200">
            </a>
        </div>
    	</td>

    	<td>
	    <div class="image">
	    		<img src="image/stfMain.jpg" alt="Stf Main Page">
	    </div>
		</td>
		</tr>
	</table>
	</div>
</body>
</html>