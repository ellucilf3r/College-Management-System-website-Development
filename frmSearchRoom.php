<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Room</title>
    <link rel="stylesheet" href="style8.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>  
       $(document).ready(function () {  
            $("#rBlock").on("keyup", function () {  
                var value = $(this).val().toLowerCase();  
                $("#rooms tr").filter(function () {  
                    $(this).toggle($(this).find("td:nth-child(3)").text().toLowerCase().indexOf(value) > -1);  
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
    <form name="frmSearchRoom" method="POST" action="">
        <table align="center" width="100%">
            <tr>
                <td colspan="2" align="center" style="width: 100%;margin-top: 15px;">
                    <h1><b>Search Room Details</b></h1>
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 5px;white-space: nowrap;"><b>Enter Room Block:</b></td>
                <td style="padding-left: 0px;"><input type="text" id="rBlock" name="rBlock" placeholder="Block Name" style="width: 150px; padding: 3px; margin: 0;"></td>
            </tr>
        </table>

        <br><p align="center"><b>Please read this!</b></p>
        <p align="center">
            Male Block: Kenanga, Mawar <br>
            Female Block: Melati, Dahlia, Seroja
        </p>

        <div class="container">
        <table border="1" width="70%" style="margin: 20px auto; text-align: center;">
            <tr>
                <td><b>Room ID</b></td>
                <td><b>Student ID</b></td>
                <td><b>Room Block</b></td>
                <td><b>Room Floor</b></td>
                <td><b>House Number</b></td>
                <td><b>Room Number</b></td>
                <td><b>Room Type</b></td>
                <td><b>Student Letter</b></td>
                <td colspan="2" align="center"><b>Action</b></td>
            </tr>

            <?php
                include 'dbc.php';
                $listRooms = "SELECT * FROM `room`;";
                $chksql = mysqli_query($dbc, $listRooms);

                if ($chksql) {
                    while ($roomRec = mysqli_fetch_assoc($chksql)) {
                        echo '<tbody id="rooms">
                        <tr>
                        <td>'.$roomRec['room_id'].'</td>
                        <td>'.$roomRec['Student_ID'].'</td>
                        <td>'.$roomRec['Room_Block'].'</td>
                        <td>'.$roomRec['Room_Floor'].'</td>
                        <td>'.$roomRec['House_Number'].'</td>
                        <td>'.$roomRec['Room_Number'].'</td>
                        <td>'.$roomRec['Room_Type'].'</td>
                        <td>'.$roomRec['Student_Letter'].'</td>
                        <td><a href="frmUpdateRoom.php?room_id=' . $roomRec['room_id'] . '">Update</a></td>
                        <td><a href="frmDeleteRoom.php?room_id=' . $roomRec['room_id'] . '">Delete</a></td>
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
