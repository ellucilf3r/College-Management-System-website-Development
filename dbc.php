<?php
$dbc=mysqli_connect('localhost', 'root', '', 'collegedb');
	if(!$dbc)
	{
		echo "Problem in Database Connection".mysqli_error();
	}
?> 