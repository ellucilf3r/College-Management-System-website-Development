<?php
include 'dbc.php'; // Include your database connection

// Start the session to capture session variables
session_start();

// Retrieve student details from the form
$studentID = mysqli_real_escape_string($dbc, $_POST['studentID']);
$studentName = mysqli_real_escape_string($dbc, $_POST['studentName']);
$studentEmail = mysqli_real_escape_string($dbc, $_POST['studentEmail']);
$studentPhone = mysqli_real_escape_string($dbc, $_POST['studentPhone']);
$studentGender = mysqli_real_escape_string($dbc, $_POST['custgen']);
$studentPosition = mysqli_real_escape_string($dbc, $_POST['studentPosition']);
$studentFaculty = mysqli_real_escape_string($dbc, $_POST['sFac']);
$studentProgramme = mysqli_real_escape_string($dbc, $_POST['sPro']);
$programmeCode = mysqli_real_escape_string($dbc, $_POST['cPro']);
$studentSemester = mysqli_real_escape_string($dbc, $_POST['sSem']);

// Update student record with new details
$updateStudentQuery = "
    UPDATE `student`
    SET `Student_Name` = '$studentName', `Student_Email` = '$studentEmail', `Student_PhoneNo` = '$studentPhone', 
        `Student_Gender` = '$studentGender', `Student_Position` = '$studentPosition', `Prog_Faculty` = '$studentFaculty',
        `Prog_Name` = '$studentProgramme', `Prog_Code` = '$programmeCode', `Student_Semester` = '$studentSemester'
    WHERE `Student_ID` = '$studentID'
";

$updateResult = mysqli_query($dbc, $updateStudentQuery);

if ($updateResult) {
    echo '<script>alert("Student details updated successfully!");</script>';
    echo '<script>window.location.assign("frmSearchStud.php");</script>'; // Redirect to the student search page
} else {
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmSearchStud.php");</script>';
}

// Close the connection
mysqli_close($dbc);
?>
