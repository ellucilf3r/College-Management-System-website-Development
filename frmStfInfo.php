<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Staff Register</title>
	<link rel="stylesheet" href="style7.css">

</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
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
	<form name="frmStfInfo" method="POST" action="stfInfo.php">
      <div class="form-stdInfo">
        <div style="display: flex; gap:20px; align-items:flex-start ;">
          <div style="flex: 1;">
            <img src="image/staffInfo.jpg" alt="Staff Info Image" style="width: 700px; height: 640px; background-size: cover; margin-top: 10px;">
          </div>
          <div style="flex: 1; padding: 10px; display:flex; flex-direction: column; gap: 5px;">
          	<h1>STAFF INFORMATION</h1>
          	<label for="stID" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Staff ID:</label><br>
            <input type="text" id="stfID" name="stfID" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>

            <label for="stfName" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Staff Name:</label><br>
            <input type="text" id="stfName" name="stfName" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>
            
            <label for="stfPhone" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Phone Number:</label><br>
            <input type="text" id="stfPhone" name="stfPhone" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>

            <label for="stfPos" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Staff Position:</label><br>
            <select name="stfPos" id="stfPos" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required>
                <option value="" disabled selected>Assistant Registration</option>
                <option value="Assistant Registration">Assistant Registration</option>
                <option value="Executive Officer">Executive Officer</option>
                <option value="Senior Hostel Supervisor">Senior Hostel Supervisor</option>
            </select>

            <label for="stfPass" style="font-size: 14px;font-family: 'Norwester', sans-serif; font-weight: bold;">Password:</label><br>
            <input type="password" id="stfPass" name="stfPass" style="width: 100%;padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" required><br>

            <div class="form-buttons">
            <button type="reset" class="clear">CLEAR</button>
            <button type="submit" class="register">REGISTER</button>
            </div>

          </div>
        </div>
      </div>
    </form>
	</section>
</body>
</html>