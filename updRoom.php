<?php
include 'dbc.php';
session_start();

$room_id = mysqli_real_escape_string($dbc, $_POST['room_id']);
$studentID = mysqli_real_escape_string($dbc, $_POST['studentID']);
$roomBlock = mysqli_real_escape_string($dbc, $_POST['roomBlock']);
$roomFloor = mysqli_real_escape_string($dbc, $_POST['roomFloor']);
$houseNumber = mysqli_real_escape_string($dbc, $_POST['houseNumber']);
$roomNumber = mysqli_real_escape_string($dbc, $_POST['roomNumber']);
$roomType = mysqli_real_escape_string($dbc, $_POST['roomType']);
$studentLetter = mysqli_real_escape_string($dbc, $_POST['studentLetter']);

// Check if the new room details are already occupied by another student
$checkRoomQuery = "SELECT * FROM `room` 
                   WHERE `Room_Block` = '$roomBlock' 
                   AND `Room_Floor` = '$roomFloor' 
                   AND `House_Number` = '$houseNumber' 
                   AND `Room_Number` = '$roomNumber' 
                   AND `room_id` != '$room_id'"; // Exclude the current room being updated
                   
$checkResult = mysqli_query($dbc, $checkRoomQuery);

if (mysqli_num_rows($checkResult) > 0) {
    echo '<script>alert("Error: Another student has already chosen this room!");</script>';
    echo '<script>window.location.assign("frmSearchRoom.php");</script>';
    exit();
}

// Update the room details
$updateRoomQuery = "
    UPDATE `room`
    SET `Student_ID` = '$studentID',
        `Room_Block` = '$roomBlock',
        `Room_Floor` = '$roomFloor',
        `House_Number` = '$houseNumber',
        `Room_Number` = '$roomNumber',
        `Room_Type` = '$roomType',
        `Student_Letter` = '$studentLetter'
    WHERE `room_id` = '$room_id'
";

$updateResult = mysqli_query($dbc, $updateRoomQuery);

if ($updateResult) {
    echo '<script>alert("Room information updated successfully!");</script>';
    echo '<script>window.location.assign("frmSearchRoom.php");</script>';
} else {
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmSearchRoom.php");</script>';
}

mysqli_close($dbc);
?>
