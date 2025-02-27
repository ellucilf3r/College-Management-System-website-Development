<?php 
include 'dbc.php';
session_start();
// Auto-generate Feedback ID
function generateFeedbackID($dbc) {
    $query = "SELECT `Feedback_ID` FROM `feedback` ORDER BY `Feedback_ID` DESC LIMIT 1;";
    $result = mysqli_query($dbc, $query);
    $lastID = mysqli_fetch_array($result);

    if ($lastID)
    {
        $idNum = intval(substr($lastID['Feedback_ID'], 1)) + 1; // Extract the numeric part and increment
        return 'F' . str_pad($idNum, 3, '0', STR_PAD_LEFT); 
    } else {
        return 'F001'; // Default ID if no records exist
    }
}

// Retrieve data from the form
$studentID = mysqli_real_escape_string($dbc, $_POST['stdID']);
$feedbackType = mysqli_real_escape_string($dbc, $_POST['fType']);
$feedbackDate = mysqli_real_escape_string($dbc, $_POST['fDate']);


// Generate the Feedback ID
$feedbackID = generateFeedbackID($dbc);

// Insert feedback record into the 'feedback' table
$insertFeedback = "INSERT INTO `feedback` (`Feedback_ID`, `Feedback_Type`, `Feedback_Date`, `Feedback_Status`, `Student_ID`, `Staff_ID`) 
                   VALUES ('$feedbackID', '$feedbackType', '$feedbackDate', 'Pending', '$studentID', NULL);";

$insertFeedbackSql = mysqli_query($dbc, $insertFeedback);

if ($insertFeedbackSql) {
    echo '<script>alert("Feedback successfully submitted!");</script>';
    echo '<script>window.location.assign("frmLogout.php");</script>';
} else {
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmStudFeed.php");</script>';
}

// Close the connection
mysqli_close($dbc);
?>
