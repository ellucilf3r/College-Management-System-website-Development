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
	<title>Student Fee</title>
	<link rel="stylesheet" href="style5.css">
  <script>
        function goToNextPage() {
            window.location.href = 'frmStudFeed.php';
        }
  </script>

  <script>
    function calculateTotal() {
        let electricalItems = document.getElementById("fElectrical").value;
        let totalFee = (parseInt(electricalItems) * 10) + 420;
        document.querySelector('input[name="feeTot"]').value = "RM "+totalFee;
    }
  </script>

</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmStudRoom.php">
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
    <form name="frmStudFee" method="POST" action="studFee.php">
      <h1>FEE INFORMATION</h1>
    <div class="form-stdFee">
      <table>
        <tr>
          <td>Fee Session:</td>
          <td>
            <select name="fSession" id="fSession" required>
                <option value="" disabled selected>20241</option>
                <option value="20241">20241</option>
                <option value="20242">20242</option>
                <option value="20251">20251</option>
                <option value="20252">20252</option>
            </select>
          </td>
          <td>Fee Reason:</td>
          <td>
            <input type="file" id="stdReason" name="stdReason">
          </td>
        </tr>

        <tr>
          <td>Total<br> Electrical Item:</td>
          <td>
            <select name="fElectrical" id="fElectrical" required>
                <option value="" disabled selected>1</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
          </td>
          <td>Payment Date:</td>
          <td>
            <input type="date" name="feeDate">
          </td>
        </tr>

        <tr>
          <td>College Fee:</td>
          <td style="font-weight: normal;">RM420.00</td>
          <td>Equipment Type:</td>
          <td>
          <div class="container">
              <label><input type="checkbox" name="equipment[]" value="Laptop"> Laptop</label>
              <label><input type="checkbox" name="equipment[]" value="PC"> PC</label>
              <label><input type="checkbox" name="equipment[]" value="Phone"> Phone</label>
              <label><input type="checkbox" name="equipment[]" value="Iron"> Iron</label>
              <label><input type="checkbox" name="equipment[]" value="Printer"> Printer</label>
              <label><input type="checkbox" name="equipment[]" value="Kettle"> Kettle</label>
          </div>
          </td>
        </tr>
      </table>
      <label style="color: white; font-family: 'Norwester', sans-serif;font-weight: bold;">-------------------------------------------------------------------------------------------------------------------------------<br></label>
      <table align="left" style="width: 20%;border-spacing: 10px;margin: 0 auto;">
        <tr>
          <td style="padding: 10px; vertical-align: center;">TOTAL:</td>
          <td>
            <input type="text" name="feeTot" style="width: 200px; padding: 10px;font-size: 14px;border: 1px solid #ccc;border-radius: 5px;outline: none;" onclick="calculateTotal()">
          </td>
        </tr>

        <tr>

          <td>
          <div class="button-container">
            <button type="submit" class="action-button">SAVE</button>
            <button type="button" class="action-button" onclick="goToNextPage()">NEXT</button>
          </div>
          </td>
        </tr>
      </table>
    </div>
  </form>
	</section>
</body>
</html>