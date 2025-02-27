<?php
session_start();
include("dbc.php"); // Include the database connection

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve and sanitize user input
    $staffId = mysqli_real_escape_string($dbc, $_POST['staffId']); // $dbc should be established in dbc.php
    $password = mysqli_real_escape_string($dbc, $_POST['password']);

    // Determine table and columns for staff login
    $table = "staff";
    $usernameColumn = "Staff_ID";
    $passwordColumn = "stfPass"; // Password field in the staff table

    // Query the database for the staff
    $query = "SELECT * FROM $table WHERE $usernameColumn = ?";
    $stmt = $dbc->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $dbc->error); // Check if query preparation failed
    }
    $stmt->bind_param("s", $staffId); // Bind the staff ID to the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the staff exists
    if ($result && $result->num_rows > 0) {
        $staff = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $staff[$passwordColumn])) {
            // Successful login: Set session variables
            $_SESSION['staffId'] = $staff['Staff_ID'];
            $_SESSION['staffName'] = $staff['Staff_Name'];
            echo '<script>alert("You have Successfully Login!");</script>';
            echo '<script>window.location.assign("frmStfMain.php");</script>';
            exit();
        } else {
            // Password verification failed
            $_SESSION['error'] = "Wrong Staff ID or Password!";
            echo '<script>alert("Wrong Student ID or Password!");</script>';
            echo '<script>window.location.assign("frmLoginStf.php");</script>';
            exit();
        }
    } else {
        // Staff not found
        $_SESSION['error'] = "Wrong Staff ID or Password!";
        echo '<script>alert("Please Register First");</script>'; // Redirect to login page with error
        echo '<script>window.location.assign("frmLoginStf.php");</script>';
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header("Location: frmLoginStf.php");
    exit();
}
?>
