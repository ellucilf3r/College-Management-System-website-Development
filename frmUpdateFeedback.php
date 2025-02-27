<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Feedback</title>
    <link rel="stylesheet" href="style9.css">
</head>
<body>
    <section class="header">
        <nav>
          <div class="navbar">
            <div class="leftFunction">
              <a href="frmSearchFeed.php">
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
        <div class="form-container">
            <form name="frmUpdateFeedback" method="POST" action="updFeedback.php">
                <h1>Update Student Feedback</h1>

                <div class="form-group">
                    <label for="staffID">Staff ID:</label>
                    <input type="text" id="staffID" name="staffID" required>
                </div>

                <div class="form-group">
                    <label for="feedbackID">Feedback ID:</label>
                    <input type="text" id="feedbackID" name="feedbackID" required>
                </div>

                <div class="form-group">
                    <label for="feedbackStatus">New Feedback Status:</label>
                    <select name="feedbackStatus" id="feedbackStatus" required>
                        <option value="Pending">Pending</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Resolved">Resolved</option>
                    </select>
                </div>

                <button type="submit">UPDATE</button>
            </form>
        </div>
    </section>
</body>
</html>
