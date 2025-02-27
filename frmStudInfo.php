<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Registration</title>
  <link rel="stylesheet" href="style1.css">
</head>
<body>
    <section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmStudMain.php">
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
    <form name="frmStudInfo" method="POST" action="studInfo.php">
      <h1>STUDENT INFORMATION</h1>
      <div class="form-stdInfo">
      <table>
        <tr>
          <td>Student Name:</td>
          <td><input type="text" name= "stdname"></td>
          <td>Student Position:</td>
          <td>
            <select name="stdPosition" id="stdPosition" required>
                <option value="" disabled selected>Commander</option>
                <option value="None">None</option>
                <option value="Commander">Commander</option>
                <option value="Student Representative Council">Student Representative Council</option>
                <option value="College Representative Committee">College Representative Committee</option>
            </select>

          </td>
        </tr>

        <tr>
          <td>Student ID:</td>
          <td><input name="sid" type="text" size="10"></td>
          <td>Faculty:</td>
          <td>
              <select name="sFac" id="sFac" required>
              <option value="" disabled selected>Faculty of Accountancy</option>
              <option value="Faculty of Accountancy">Faculty of Accountancy</option>
              <option value="Faculty of Applied Science">Faculty of Applied Science</option>
              <option value="Faculty of Mathematics and Science">Faculty of Mathematics and Science</option>
              <option value="Faculty of Hospitality Management">Faculty of Hospitality Management</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Email:</td>
          <td><input type="email" name="sEmail"></td>
          <td>Programme:</td>
          <td>
            <select name="sPro" id="sPro" required>
              <option value="" disabled selected>Diploma in Accounting</option>
              <option value="Diploma in Accounting">Diploma in Accounting</option>
              <option value="Diploma in Applied Science">Diploma in Applied Science</option>
              <option value="Diploma in Applied Mathematics">Diploma in Applied Mathematics</option>
              <option value="Diploma in Hotel Management">Diploma in Hotel Management</option>
              <option value="Bachelor of Finance and Accounting">Bachelor of Finance and Accounting</option>
              <option value="Bachelor of Science Mathematics">Bachelor of Science Mathematics</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Phone Number:</td>
          <td><input type= "number" name= "sPhone" maxlength="11"></td>
          <td>Programme Code:</td>
          <td>
            <select name= "cPro" id="cPro" required>
              <option value="" disabled selected>DAC101</option>
              <option value="DAC101">DAC101</option>
              <option value="AS250">AS250</option>
              <option value="DAM102">DAM102</option>
              <option value="DHM103">DHM103</option>
              <option value="BFA202">BFA202</option>
              <option value="SM260">SM260</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Student Gender:</td>
          <td>
            <input type="radio" name= "custgen" value="F">Female   
            <input type="radio" name="custgen" value="M">Male
          </td>
          <td>Semester:</td>
          <td>
            <select name= "sSem" id="sSem" required>
              <option value="" disabled selected>1</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
          </td>
        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="stdPassword" required></td>
        </tr>

      </table> 
      </div> 
      <div class="form-buttons">
        <button type="reset" class="clear">CLEAR</button>
        <button type="submit" class="register">REGISTER</button>
      </div>
    </form>
   </section>
</body>
</html>