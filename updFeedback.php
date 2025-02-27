<?php
include 'dbc.php'; // Include your database connection

// Start the session to capture session variables
session_start();

// Retrieve form inputs and sanitize them
$feedbackID = mysqli_real_escape_string($dbc, $_POST['feedbackID']);
$staffID = mysqli_real_escape_string($dbc, $_POST['staffID']);
$feedbackStatus = mysqli_real_escape_string($dbc, $_POST['feedbackStatus']);

// Check if the Feedback ID exists before updating
$checkFeedbackQuery = "SELECT * FROM feedback WHERE Feedback_ID = '$feedbackID'";
$checkFeedbackResult = mysqli_query($dbc, $checkFeedbackQuery);

if (mysqli_num_rows($checkFeedbackResult) > 0) {
    // Proceed with the update
    $updateFeedbackQuery = "
        UPDATE `feedback`
        SET `Feedback_Status` = '$feedbackStatus', `Staff_ID` = '$staffID'
        WHERE `Feedback_ID` = '$feedbackID'
    ";

    $updateResult = mysqli_query($dbc, $updateFeedbackQuery);

    if ($updateResult) {
        echo '<script>alert("Feedback status updated successfully!");</script>';
        echo '<script>window.location.assign("frmSearchFeed.php");</script>'; // Redirect to feedback search page
    } else {
        echo '<script>alert("Error updating feedback: ' . mysqli_error($dbc) . '");</script>';
    }
} else {
    echo '<script>alert("Error: Feedback ID does not exist!");</script>';
}

// Close the database connection
mysqli_close($dbc);
?>
