<?php
include 'dbc.php';

// Retrieve form data
$staffID = mysqli_real_escape_string($dbc, $_POST['stfID']);
$staffName = mysqli_real_escape_string($dbc, $_POST['stfName']);
$staffPhone = mysqli_real_escape_string($dbc, $_POST['stfPhone']);
$staffPosition = mysqli_real_escape_string($dbc, $_POST['stfPos']);
$password = mysqli_real_escape_string($dbc, $_POST['stfPass']); // Capture password


// Hash the password using bcrypt for security
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insert the staff information into the 'staff' table
$insertStaff = "INSERT INTO `staff` (`Staff_ID`, `Staff_Name`, `Staff_PhoneNo`, `Staff_Position`, `stfPass`) 
                VALUES ('$staffID', '$staffName', '$staffPhone', '$staffPosition', '$hashedPassword')";

$insertStaffSql = mysqli_query($dbc, $insertStaff);

if ($insertStaffSql) {
    // If the insertion is successful
    echo '<script>alert("You have successfully registered!");</script>';
    echo '<script>window.location.assign("frmLoginStf.php");</script>';
} else {
    // If there's an error during the insertion
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmStfInfo.php");</script>';
}

// Close the connection
mysqli_close($dbc);
?>
