<?php
session_start();
include("dbc.php"); // Include the database connection

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve and sanitize user input
    $studentId = mysqli_real_escape_string($dbc, $_POST['studentId']); // $dbc should be established in dbc.php
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    // Determine table and columns for student login
    $table = "student";
    $usernameColumn = "Student_ID";
    $passwordColumn = "stdPass"; // Password field in the student table

    // Query the database for the student
    $query = "SELECT * FROM $table WHERE $usernameColumn = ?";
    $stmt = $dbc->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $dbc->error); // Check if query preparation failed
    }
    $stmt->bind_param("s", $studentId); // Bind the student ID to the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the student exists
    if ($result && $result->num_rows > 0) {
        $student = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $student[$passwordColumn])) {
            // Successful login: Set session variables
            $_SESSION['studentId'] = $student['Student_ID'];
            $_SESSION['studentName'] = $student['Student_Name'];
            echo '<script>alert("You have Successfully Login!");</script>';
            echo '<script>window.location.assign("frmStudMain.php");</script>';
            exit();
        } else {
            // Password verification failed
            $_SESSION['error'] = "Wrong Student ID or Password!";
            echo '<script>alert("Wrong Student ID or Password!");</script>';
            echo '<script>window.location.assign("frmLoginStud.php");</script>';
            exit();
        }
    } else {
        // Student not found
        $_SESSION['error'] = "Wrong Student ID or Password!";
        echo '<script>alert("Please Register First");</script>';
        echo '<script>window.location.assign("frmLoginStud.php");</script>';
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header("Location: frmLoginStud.php");
    exit();
}
?>
