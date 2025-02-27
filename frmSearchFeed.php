<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search Feedback</title>
	<link rel="stylesheet" href="style8.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>  
       $(document).ready(function () {  
        $("#status").on("keyup", function () {  
         var value = $(this).val().toLowerCase();  
         $("#feedbacks tr").filter(function () {  
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)  
         });  
        });  
       });  
  </script>

</head>
<body>
	<section class="header">
    <nav>
      <div class="navbar">
        <div class="leftFunction">
          <a href="frmStfMain.php">
            <img src="image/backbutton.png" alt="Back Button" width="45" height="45">
          </a>
            <a href="aboutUs.html">About Us</a>            
        </div>
        <div class="rightFunction">
            <a href="frmLogout.php">Log Out</a>
            <a href="homePage.php">
            <img src="image/homeBtn.png" alt="Home Button" width="45" height="45">
            </a>
        </div>
      </div>
    </nav>
	<form name="frmSearchFeed" method=" " action="">
		<table align="center" width="100%">
			<tr>
				<td colspan="2" align="center" style="width: 100%;margin-top: 15px;">
					<h1><b>Search Feedback Details</b></h1>
				</td>
			</tr>

			<tr>
				<td style="text-align: right; padding-right: 5px;white-space: nowrap;"><b>Enter Feedback Status:</b></td>
				<td style="padding-left: 0px;"><input type="text" id="status" style="width: 150px; padding: 3px; margin: 0;"></td>
			</tr>
		</table>

		<div class="container">
		<table border="1" width="70%" style="margin: 20px auto; text-align: center;">
			<tr>
				<td><b>Feedback ID</b></td>
				<td><b>Feedback Type</b></td>
				<td><b>Feedback Date</b></td>
				<td><b>Feedback Status</b></td>
				<td><b>Student ID</b></td>
				<td><b>Staff ID</b></td>
				<td colspan="2" align="center"><b>Action</b></td>
			</tr>

			<?php
				include 'dbc.php';
				$listfeedback = "SELECT * FROM `feedback`;";
				$chksql = mysqli_query($dbc, $listfeedback);

				if($chksql)
				{
					while ($feedrec = mysqli_fetch_assoc($chksql))
					{
						echo '<tbody id="feedbacks">
						<tr>
						<td>'.$feedrec['Feedback_ID'].'</td>
						<td>'.$feedrec['Feedback_Type'].'</td>
						<td>'.$feedrec['Feedback_Date'].'</td>
						<td>'.$feedrec['Feedback_Status'].'</td>
						<td>'.$feedrec['Student_ID'].'</td>
						<td>'.$feedrec['Staff_ID'].'</td>
						<td><a href="frmUpdateFeedback.php?fid=' . $feedrec['Feedback_ID'] . '">Update</a></td>
        				<td><a href="frmDeleteFeedback.php?fid=' . $feedrec['Feedback_ID'] . '">Delete</a></td>
						</tr>
						</tbody>';
					}
				}
			?>
		</table>
		</div>
	</form>
	</section>
</body>
</html>
