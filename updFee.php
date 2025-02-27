<?php
include 'dbc.php'; // Include your database connection

// Start the session to capture session variables
session_start();

// Retrieve form inputs and sanitize them
$feeNum = mysqli_real_escape_string($dbc, $_POST['feeNum']);
$feeSession = mysqli_real_escape_string($dbc, $_POST['feeSession']);
$feeElectrical = mysqli_real_escape_string($dbc, $_POST['feeElectrical']);
$feeCollegeAmount = mysqli_real_escape_string($dbc, $_POST['feeCollegeAmount']);
$feeFine = mysqli_real_escape_string($dbc, $_POST['feeFine']);
$feeStatus = mysqli_real_escape_string($dbc, $_POST['feeStatus']);
$feeReason = mysqli_real_escape_string($dbc, $_POST['feeReason']);
$feeEquip = mysqli_real_escape_string($dbc, $_POST['feeEquip']);
$feeDate = mysqli_real_escape_string($dbc, $_POST['feeDate']);
$studentID = mysqli_real_escape_string($dbc, $_POST['studentID']);
$feeTot = mysqli_real_escape_string($dbc, $_POST['feeTot']);

// Check if the Fee Number exists before updating
$checkFeeQuery = "SELECT * FROM fee WHERE Fee_Num = '$feeNum'";
$checkFeeResult = mysqli_query($dbc, $checkFeeQuery);

if (mysqli_num_rows($checkFeeResult) > 0) {
    // Proceed with the update
    $updateFeeQuery = "
        UPDATE `fee`
        SET `Fee_Session` = '$feeSession',
            `Fee_Electrical` = '$feeElectrical',
            `Fee_CollegeAmount` = '$feeCollegeAmount',
            `Fee_Fine` = '$feeFine',
            `Fee_Status` = '$feeStatus',
            `Fee_Reason` = '$feeReason',
            `Fee_Equip` = '$feeEquip',
            `Fee_Date` = '$feeDate',
            `Fee_Tot` = '$feeTot',
            `Student_ID` = '$studentID'
        WHERE `Fee_Num` = '$feeNum'
    ";

    $updateResult = mysqli_query($dbc, $updateFeeQuery);

    if ($updateResult) {
        echo '<script>alert("Fee details updated successfully!");</script>';
        echo '<script>window.location.assign("frmSearchFee.php");</script>'; // Redirect to fee search page
    } else {
        echo '<script>alert("Error updating fee details: ' . mysqli_error($dbc) . '");</script>';
    }
} else {
    echo '<script>alert("Error: Fee ID does not exist!");</script>';
}

// Close the database connection
mysqli_close($dbc);
?>
