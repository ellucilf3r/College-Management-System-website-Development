<?php
	include "dbc.php";

	// Get the Fee Number from the URL parameter
	$feeNum = $_GET['fid'];

	// SQL query to delete the fee record from the database
	$sqldel = "DELETE FROM `fee` WHERE `Fee_Num` = '$feeNum'";

	$deleteResult = mysqli_query($dbc, $sqldel);

	if ($deleteResult) 
	{
    echo '<script>alert("Fee record has been deleted successfully!");</script>';
    echo '<script>window.location.assign("frmSearchFee.php");</script>'; // Redirect to the fee search page
	} 
	else 
	{
    echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
    echo '<script>window.location.assign("frmSearchFee.php");</script>';
	}
?>
