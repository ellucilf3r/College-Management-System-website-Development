<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Information</title>
  <link rel="stylesheet" href="style9.css">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student</title>
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
        <form name="frmUpdateStudent" method="POST" action="updStudent.php">
          <h1>Update Student Information</h1>

        <div class="form-group">  
        <label for="studentID">Student ID:</label>
        <input type="text" id="studentID" name="studentID"><br>
        </div>

        <div class="form-group"> 
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName"><br>
        </div>

        <div class="form-group">
        <label for="studentEmail">Student Email:</label>
        <input type="email" id="studentEmail" name="studentEmail"><br>
        </div>

        <div class="form-group">
        <label for="studentPhone">Phone Number:</label>
        <input type="text" id="studentPhone" name="studentPhone"><br>
        </div>

        <div class="form-group">
        <label>Student Gender:</label>
        <input type="radio" name= "custgen" value="F">Female   
        <input type="radio" name="custgen" value="M">Male<br>
        </div>

        <div class="form-group">
        <label for="studentPosition">Student Position:</label>
        <select name="studentPosition" id="studentPosition" >
                <option value="" disabled selected>Commander</option>
                <option value="None">None</option>
                <option value="Commander">Commander</option>
                <option value="Student Representative Council">Student Representative Council</option>
                <option value="College Representative Committee">College Representative Committee</option>
        </select><br>
        </div>

        <div class="form-group">
        <label>Faculty:</label>
        <select name="sFac" id="sFac">
              <option value="" disabled selected>Faculty of Accountancy</option>
              <option value="Faculty of Accountancy">Faculty of Accountancy</option>
              <option value="Faculty of Applied Science">Faculty of Applied Science</option>
              <option value="Faculty of Mathematics and Science">Faculty of Mathematics and Science</option>
              <option value="Faculty of Hospitality Management">Faculty of Hospitality Management</option>
        </select><br>
        </div>

        <div class="form-group">
        <label>Programme:</label>
        <select name="sPro" id="sPro" >
              <option value="" disabled selected>Diploma in Accounting</option>
              <option value="Diploma in Accounting">Diploma in Accounting</option>
              <option value="Diploma in Applied Science">Diploma in Applied Science</option>
              <option value="Diploma in Applied Mathematics">Diploma in Applied Mathematics</option>
              <option value="Diploma in Hotel Management">Diploma in Hotel Management</option>
              <option value="Bachelor of Finance and Accounting">Bachelor of Finance and Accounting</option>
              <option value="Bachelor of Science Mathematics">Bachelor of Science Mathematics</option>
        </select><br>
        </div>

        <div class="form-group">
        <label>Programme Code:</label>
        <select name= "cPro" id="cPro" >
              <option value="" disabled selected>DAC101</option>
              <option value="DAC101">DAC101</option>
              <option value="AS250">AS250</option>
              <option value="DAM102">DAM102</option>
              <option value="DHM103">DHM103</option>
              <option value="BFA202">BFA202</option>
              <option value="SM260">SM260</option>
        </select><br>
        </div>

        <div class="form-group">
        <label>Student Semester:</label>
        <select name= "sSem" id="sSem" >
              <option value="" disabled selected>1</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
        </select><br>
        </div>

        <button type="submit">UPDATE</button>
    </form>
    </div>
  </section>
</body>
</html>
