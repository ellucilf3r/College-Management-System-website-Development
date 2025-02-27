<?php
    include "dbc.php";

    // Get the Student ID from the URL parameter
    $sid = $_GET['sid'];

    // SQL query to delete the student record from the database
    $sqldel = "DELETE FROM `student` WHERE `Student_ID` = '$sid'";

    $deleteResult = mysqli_query($dbc, $sqldel);

    if ($deleteResult) 
    {
        echo '<script>alert("Student has been deleted successfully!");</script>';
        echo '<script>window.location.assign("frmSearchStud.php");</script>'; // Redirect to the student view page
    } 
    else 
    {
        echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
        echo '<script>window.location.assign("frmSearchStud.php");</script>';
    }
    
    // Close the connection
    mysqli_close($dbc);
?>
