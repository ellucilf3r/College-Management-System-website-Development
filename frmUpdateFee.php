<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Fee Details</title>
    <link rel="stylesheet" href="style9.css">

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
              <a href="frmSearchFee.php">
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
            <?php
                include 'dbc.php';

                // Get Fee_Num from query string
                if (isset($_GET['fid'])) {
                    $feeNum = $_GET['fid'];

                    // Fetch the fee details from the database
                    $feeQuery = "SELECT * FROM `fee` WHERE `Fee_Num` = '$feeNum';";
                    $result = mysqli_query($dbc, $feeQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $fee = mysqli_fetch_assoc($result);
                    } else {
                        echo "<p>Fee record not found.</p>";
                        exit;
                    }
                } else {
                    echo "<p>No Fee ID provided.</p>";
                    exit;
                }
            ?>
            <form name="frmUpdateFee" method="POST" action="updFee.php">
                <h1>Update Fee Details</h1>

                <div class="form-group">
                    <label for="feeNum">Fee Number:</label>
                    <input type="text" id="feeNum" name="feeNum" value="<?php echo $fee['Fee_Num']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="feeSession">Fee Session:</label>
                    <input type="text" id="feeSession" name="feeSession" value="<?php echo $fee['Fee_Session']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeElectrical">Fee Electrical:</label>
                    <input type="text" id="feeElectrical" name="feeElectrical" value="<?php echo $fee['Fee_Electrical']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeCollegeAmount">Fee College Amount:</label>
                    <input type="text" id="feeCollegeAmount" name="feeCollegeAmount" value="<?php echo $fee['Fee_CollegeAmount']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeFine">Fee Fine:</label>
                    <input type="text" id="feeFine" name="feeFine" value="<?php echo $fee['Fee_Fine']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeStatus">Fee Status:</label>
                    <select name="feeStatus" id="feeStatus" required>
                        <option value="Paid" <?php echo ($fee['Fee_Status'] == 'Paid') ? 'selected' : ''; ?>>Paid</option>
                        <option value="Pending" <?php echo ($fee['Fee_Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="feeReason">Fee Reason:</label>
                    <input type="text" id="feeReason" name="feeReason" value="<?php echo $fee['Fee_Reason']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeEquip">Fee Equipment:</label>
                    <input type="text" id="feeEquip" name="feeEquip" value="<?php echo $fee['Fee_Equip']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeDate">Fee Date:</label>
                    <input type="date" id="feeDate" name="feeDate" value="<?php echo $fee['Fee_Date']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="studentID">Student ID:</label>
                    <input type="text" id="studentID" name="studentID" value="<?php echo $fee['Student_ID']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="feeTot">Fee Total:</label>
                    <input type="text" id="feeTot" name="feeTot" value="<?php echo $fee['Fee_Tot']; ?>" required >
                </div>

                <button type="submit">UPDATE</button>
            </form>
        </div>
    </section>
</body>
</html>
