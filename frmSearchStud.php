<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Student</title>
    <link rel="stylesheet" href="style8.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>  
        $(document).ready(function () {  
            $("#student_id").on("keyup", function () {  
                var value = $(this).val().toLowerCase();  
                $("#students tr").filter(function () {  
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
    <form name="frmSearchStud" method=" " action="">
        <table align="center" width="100%">
            <tr>
                <td colspan="2" align="center" style="width: 100%;margin-top: 15px;">
                    <h1><b>Search Student Details</b></h1>
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding-right: 5px;white-space: nowrap;"><b>Enter Student ID:</b></td>
                <td style="padding-left: 0px;"><input type="text" id="student_id" style="width: 150px; padding: 3px; margin: 0;"></td>
            </tr>
        </table>

        <div class="container">
        <table border="1" width="70%" style="margin: 20px auto; text-align: center;">
            <tr>
                <td><b>Student ID</b></td>
                <td><b>Student Name</b></td>
                <td><b>Student Email</b></td>
                <td><b>Phone Number</b></td>
                <td><b>Gender</b></td>
                <td><b>Position</b></td>
                <td><b>Faculty</b></td>
                <td><b>Program Name</b></td>
                <td><b>Semester</b></td>
                <td><b>Program Code</b></td>
                <td colspan="2" align="center"><b>Action</b></td>
            </tr>
            <?php
                include 'dbc.php';
                $liststudents = "SELECT * FROM `student`;";
                $chksql = mysqli_query($dbc, $liststudents);
                if($chksql)
                {
                    while ($studrec = mysqli_fetch_assoc($chksql))
                    {
                        echo '<tbody id="students">'
                        .'<tr>'
                        .'<td>'.$studrec['Student_ID'].'</td>'
                        .'<td>'.$studrec['Student_Name'].'</td>'
                        .'<td>'.$studrec['Student_Email'].'</td>'
                        .'<td>'.$studrec['Student_PhoneNo'].'</td>'
                        .'<td>'.$studrec['Student_Gender'].'</td>'
                        .'<td>'.$studrec['Student_Position'].'</td>'
                        .'<td>'.$studrec['Prog_Faculty'].'</td>'
                        .'<td>'.$studrec['Prog_Name'].'</td>'
                        .'<td>'.$studrec['Student_Semester'].'</td>'
                        .'<td>'.$studrec['Prog_Code'].'</td>'
                        .'<td><a href="frmUpdateStudent.php?sid='.$studrec['Student_ID'].'">Update</a></td>'
                        .'<td><a href="frmDeleteStudent.php?sid='.$studrec['Student_ID'].'">Delete</a></td>'
                        .'</tr>'
                        .'</tbody>';
                    }
                }
            ?>
        </table>
        </div>
    </form>
    </section>
</body>
</html>
