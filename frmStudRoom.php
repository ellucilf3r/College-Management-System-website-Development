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
	<title>Student Room</title>
	<link rel="stylesheet" href="style4.css">
  <script>
        function goToNextPage() {
            window.location.href = 'frmStudFee.php';
        }
  </script>
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
    <form name="frmStudRoom" method="POST" action="studRoom.php">
      <h1>ROOM INFORMATION</h1>
    <div class="form-stdRoom">
    <table>
    	<tr>
    		<td>Student ID:</td>
          	<td><input name="sid" type="text" size="10"></td>
    		<td>Room Block:</td>
    		<td>
    			<select name="rBlock" id="rBlock" required>
              	<option value="" disabled selected>Kenanga</option>
              	<option value="Kenanga">Kenanga</option>
              	<option value="Mawar">Mawar</option>
              	<option value="Dahlia">Dahlia</option>
              	<option value="Melati">Melati</option>
              	<option value="Seroja">Seroja</option>
            </select>
    		</td>
    	</tr>

    	<tr>
    		<td>Room Floor:</td>
    		<td>
    			<select name="rFloor" id="rFloor" required>
              	<option value="" disabled selected>1</option>
              	<option value="1">1</option>
              	<option value="2">2</option>
              	<option value="3">3</option>
              	<option value="4">4</option>
              	<option value="5">5</option>
              	</select>
    		</td>
    		<td>House Number:</td>
    		<td>
    			<select name="rHouse" id="rHouse" required>
              	<option value="" disabled selected>1</option>
              	<option value="1">1</option>
              	<option value="2">2</option>
              	<option value="3">3</option>
              	<option value="4">4</option>
              	<option value="5">5</option>
              	<option value="6">6</option>
              	<option value="7">7</option>
              	<option value="8">8</option>
              	<option value="9">9</option>
              	<option value="10">10</option>
              	<option value="11">11</option>
              	<option value="12">12</option>
              	<option value="13">13</option>
              	<option value="14">14</option>
              	<option value="15">15</option>
              	<option value="16">16</option>
              	<option value="17">17</option>
              	<option value="18">18</option>
              	<option value="19">19</option>
              	<option value="20">20</option>
              	</select>
    		</td>
    	</tr>

    	<tr>
    		<td>Room Number:</td>
    		<td>
    			<select name="rRoom" id="rRoom" required>
              	<option value="" disabled selected>1</option>
              	<option value="a">a</option>
              	<option value="b">b</option>
              	<option value="c">c</option>
              	</select>
    		</td>
    		<td>Student Disability:</td>
    		<td>
            <input type="radio" name="sDis" value="Yes">Yes   
            <input type="radio" name="sDis" value="No">No
            <input type="file" id="stdLetter" name="stdLetter">
            (If Yes, <br> please upload the health declaration letter)
        </td>
    	</tr>
    </table>
    <p><b>Please read this!</b></p>
    <p>Male Block: Kenanga, Mawar <br>
	Female Block: Melati, Dahlia, Seroja</p>
	</div>
	<div class="form-buttons">
        <button type="reset" class="clear">CLEAR</button>
        <button type="submit" class="save">SAVE</button>
        <button type="button" class="next" onclick="goToNextPage()">NEXT</button>
    </div>
	</section>
</body>
</html>

