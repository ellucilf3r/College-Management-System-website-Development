<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Fee Details</title>
    <link rel="stylesheet" href="style8.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>  
        $(document).ready(function () {  
            $("#session").on("keyup", function () {  
                var value = $(this).val().toLowerCase();  
                $("#feeDetails tr").filter(function () {  
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);  
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
        <form name="frmSearchFee" method="post" action="">
            <table align="center" width="100%">
                <tr>
                    <td colspan="2" align="center" style="width: 100%;margin-top: 15px;">
                        <h1><b>Search Fee Details</b></h1>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; padding-right: 5px;white-space: nowrap;"><b>Enter Fee Session:</b></td>
                    <td style="padding-left: 0px;"><input type="text" id="session" style="width: 150px; padding: 3px; margin: 0;"></td>
                </tr>
            </table>

            <div class="container">
            <table border="1" width="70%" style="margin: 20px auto; text-align: center;">
                <tr>
                    <td><b>Fee Number</b></td>
                    <td><b>Fee Session</b></td>
                    <td><b>Fee Electrical</b></td>
                    <td><b>Fee College Amount</b></td>
                    <td><b>Fee Fine</b></td>
                    <td><b>Fee Status</b></td>
                    <td><b>Fee Reason</b></td>
                    <td><b>Fee Equipment</b></td>
                    <td><b>Fee Date</b></td>
                    <td><b>Student ID</b></td>
                    <td><b>Fee Total</b></td>
                    <td colspan="2" align="center"><b>Action</b></td>
                </tr>

                <?php
                    include 'dbc.php';
                    $listFees = "SELECT * FROM `fee`;";
                    $chksql = mysqli_query($dbc, $listFees);

                    if($chksql)
                    {
                        while ($feeRec = mysqli_fetch_assoc($chksql))
                        {
                            echo '<tbody id="feeDetails">
                            <tr>
                            <td>'.$feeRec['Fee_Num'].'</td>
                            <td>'.$feeRec['Fee_Session'].'</td>
                            <td>'.$feeRec['Fee_Electrical'].'</td>
                            <td>'.$feeRec['Fee_CollegeAmount'].'</td>
                            <td>'.$feeRec['Fee_Fine'].'</td>
                            <td>'.$feeRec['Fee_Status'].'</td>
                            <td>'.$feeRec['Fee_Reason'].'</td>
                            <td>'.$feeRec['Fee_Equip'].'</td>
                            <td>'.$feeRec['Fee_Date'].'</td>
                            <td>'.$feeRec['Student_ID'].'</td>
                            <td>'.$feeRec['Fee_Tot'].'</td>
                            <td><a href="frmUpdateFee.php?fid=' . $feeRec['Fee_Num'] . '">Update</a></td>
                            <td><a href="frmDeleteFee.php?fid=' . $feeRec['Fee_Num'] . '">Delete</a></td>
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
