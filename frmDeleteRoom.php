<?php
    include "dbc.php";

    // Get the Room ID from the URL parameter
    $room_id = $_GET['room_id'];

    // SQL query to delete the room record from the database
    $sqldel = "DELETE FROM `room` WHERE `room_id` = '$room_id'";

    $deleteResult = mysqli_query($dbc, $sqldel);

    if ($deleteResult) {
        echo '<script>alert("Room has been deleted successfully!");</script>';
        echo '<script>window.location.assign("frmSearchRoom.php");</script>'; // Redirect to the room search page
    } else {
        echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
        echo '<script>window.location.assign("frmSearchRoom.php");</script>';
    }
?>
