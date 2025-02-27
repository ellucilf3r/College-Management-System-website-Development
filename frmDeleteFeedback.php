<?php
	include "dbc.php";

	// Get the Feedback ID from the URL parameter
	$fid = $_GET['fid'];

	// SQL query to delete the feedback record from the database
	$sqldel = "DELETE FROM `feedback` WHERE `Feedback_ID` = '$fid'";

	$deleteResult = mysqli_query($dbc, $sqldel);

	if ($deleteResult) 
	{
    echo '<script>alert("Feedback has been deleted successfully!");</script>';
    echo '<script>window.location.assign("frmSearchFeed.php");</script>'; // Redirect to the feedback view page
	} 
	else 
	{
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmSearchFeed.php");</script>';
	}
	
?>
