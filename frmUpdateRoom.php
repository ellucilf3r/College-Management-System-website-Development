<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Room</title>
    <link rel="stylesheet" href="style9.css">
</head>
<body>
    <section class="header">
        <nav>
          <div class="navbar">
            <div class="leftFunction">
              <a href="frmSearchFeed.php">
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
    <?php
        include 'dbc.php';

        if (isset($_GET['room_id'])) {
            $room_id = mysqli_real_escape_string($dbc, $_GET['room_id']);
            $query = "SELECT * FROM `room` WHERE `room_id` = '$room_id'";
            $result = mysqli_query($dbc, $query);
            $room = mysqli_fetch_assoc($result);
        } else {
            echo "<script>alert('Room ID not provided!'); window.location.href='frmSearchRoom.php';</script>";
            exit();
        }
    ?>
    <div class="form-container">
    <form name="frmUpdateRoom" method="POST" action="updRoom.php">
        <h1>Update Room Information</h1>

        <div class="form-group">
            <label>Room ID:</label>
            <input type="text" name="room_id" value="<?php echo $room['room_id']; ?>">
        </div>
            
        <table align="center" border="1" width="70%" style="margin: 20px auto;border-collapse: collapse;border: 1px solid black;">
            <tr>
                <td><b>Student ID:</b></td>
                <td><input type="text" id="studentID" name="studentID" value="<?php echo $room['Student_ID']; ?>" required></td>
            </tr>
            <tr>
                <td><b>Room Block:</b></td>
                <td><input type="text" id="roomBlock" name="roomBlock" value="<?php echo $room['Room_Block']; ?>" required></td>
            </tr>
            <tr>
                <td><b>Room Floor:</b></td>
                <td>
                    <select name="roomFloor" id="roomFloor" required>
                        <?php
                            for ($i = 1; $i <= 5; $i++) {
                                $selected = ($room['Room_Floor'] == $i) ? "selected" : "";
                                echo "<option value='$i' $selected>$i</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>House Number:</b></td>
                <td>
                    <select name="houseNumber" id="houseNumber" required>
                        <?php
                            for ($i = 1; $i <= 20; $i++) {
                                $selected = ($room['House_Number'] == $i) ? "selected" : "";
                                echo "<option value='$i' $selected>$i</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>Room Number:</b></td>
                <td>
                    <select name="roomNumber" id="roomNumber" required>
                        <option value="a" <?php if ($room['Room_Number'] == 'a') echo 'selected'; ?>>a</option>
                        <option value="b" <?php if ($room['Room_Number'] == 'b') echo 'selected'; ?>>b</option>
                        <option value="c" <?php if ($room['Room_Number'] == 'c') echo 'selected'; ?>>c</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td><b>Room Type:</b></td>
                <td><input type="text" id="roomType" name="roomType" value="<?php echo $room['Room_Type']; ?>" required></td>
            </tr>
            <tr>
                <td><b>Student Letter:</b></td>
                <td><input type="text" id="studentLetter" name="studentLetter" value="<?php echo $room['Student_Letter']; ?>" required></td>
            </tr>
        </table>

        <p align="center"><b>Please read this!</b></p>
        <p align="center">
            Male Block: Kenanga, Mawar <br>
            Female Block: Melati, Dahlia, Seroja
        </p>

        <div align="center">
            <button type="reset">CLEAR</button>
            <button type="submit">UPDATE</button>
        </div>
    </form>
    </div>
</body>
</html>
