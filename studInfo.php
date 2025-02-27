<?php

include 'dbc.php'; 
session_start();
// Retrieve data from the form
$sid = mysqli_real_escape_string($dbc, $_POST['sid']);
$sname = mysqli_real_escape_string($dbc, $_POST['stdname']);
$semail = mysqli_real_escape_string($dbc, $_POST['sEmail']);
$sphone = mysqli_real_escape_string($dbc, $_POST['sPhone']);
$sgender = mysqli_real_escape_string($dbc, $_POST['custgen']);
$sposition = mysqli_real_escape_string($dbc, $_POST['stdPosition']);
$faculty = mysqli_real_escape_string($dbc, $_POST['sFac']);
$prog = mysqli_real_escape_string($dbc, $_POST['sPro']);
$ssemester = mysqli_real_escape_string($dbc, $_POST['sSem']);
$prog_code = mysqli_real_escape_string($dbc, $_POST['cPro']);
$password = mysqli_real_escape_string($dbc, $_POST['stdPassword']); // Capture password

// Hash the password using bcrypt for security
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Check if the programme code exists in the 'programme' table
$chkProg = "SELECT * FROM `programme` WHERE `Prog_Code`='$prog_code';";
$chkProgSql = mysqli_query($dbc, $chkProg);
$progRec = mysqli_num_rows($chkProgSql);

// Debug: Check for errors in the query
if (!$chkProgSql) {
    die("Query Failed: " . mysqli_error($dbc));
}

if ($progRec > 0) {
    // If programme code exists
    $progData = mysqli_fetch_array($chkProgSql);
    $prog_faculty = $progData['Prog_Faculty']; // Faculty from programme table
    $prog_name = $progData['Prog_Name']; // Programme name from programme table

    // Add student record to the 'student' table
    $addStudent = "INSERT INTO `student` 
               (`Student_ID`, `Student_Name`, `Student_Email`, `Student_PhoneNo`, `Student_Gender`, `Student_Position`, `Prog_Faculty`, `Prog_Name`, `Student_Semester`, `Prog_Code`, `stdPass`) 
               VALUES 
               ('$sid', '$sname', '$semail', '$sphone', '$sgender', '$sposition', '$faculty', '$prog', '$ssemester', '$prog_code', '$hashedPassword');";

    $addStudentSql = mysqli_query($dbc, $addStudent);
    if ($addStudentSql) {
        echo '<script>alert("You have successfully registered!");</script>';
        echo '<script>window.location.assign("frmLoginStud.php");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
        echo '<script>window.location.assign("frmStudInfo.php");</script>';
    }
} else {
    // If programme code does not exist
    echo '<script>alert("Programme Code Does Not Exist!");</script>';
    echo '<script>window.location.assign("frmStudInfo.php");</script>';
}

// Close the connection
mysqli_close($dbc);
?>
