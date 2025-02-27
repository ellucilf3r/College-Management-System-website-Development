<?php
include 'dbc.php'; // Database connection
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $studentID = mysqli_real_escape_string($dbc, $_POST['sid']);
    $roomBlock = mysqli_real_escape_string($dbc, $_POST['rBlock']);
    $roomFloor = mysqli_real_escape_string($dbc, $_POST['rFloor']);
    $houseNumber = mysqli_real_escape_string($dbc, $_POST['rHouse']);
    $roomNumber = mysqli_real_escape_string($dbc, $_POST['rRoom']);
    $studentDisability = mysqli_real_escape_string($dbc, $_POST['sDis']);
    
    // Handle file upload if student has a disability
    $studentLetter = NULL;
    if ($studentDisability == 'Yes' && isset($_FILES['stdLetter']['name']) && $_FILES['stdLetter']['error'] == 0) {
        $uploadDir = 'uploads/'; // Directory for uploaded files
        $fileName = basename($_FILES['stdLetter']['name']);
        $targetFilePath = $uploadDir . $fileName;
        
        if (move_uploaded_file($_FILES['stdLetter']['tmp_name'], $targetFilePath)) {
            $studentLetter = $targetFilePath; // Store file path in database
        } else {
            echo '<script>alert("Error uploading file.");</script>';
            echo '<script>window.location.assign("frmStudRoom.php");</script>';
            exit();
        }
    }

    // Check if the room is already taken
    $checkRoomQuery = "SELECT * FROM `room` WHERE `Room_Block` = '$roomBlock' AND `Room_Floor` = '$roomFloor' AND `House_Number` = '$houseNumber' AND `Room_Number` = '$roomNumber'";
    $checkRoomResult = mysqli_query($dbc, $checkRoomQuery);
    
    if (mysqli_num_rows($checkRoomResult) > 0) {
        echo '<script>alert("This room is already taken. Please choose another room.");</script>';
        echo '<script>window.location.assign("frmStudRoom.php");</script>';
        exit();
    }
    
    // Auto-generate Feedback ID
    function generateRoomID($dbc) {
    $query = "SELECT `room_id` FROM `room` ORDER BY `Room_id` DESC LIMIT 1;";
    $result = mysqli_query($dbc, $query);
    $lastID = mysqli_fetch_array($result);

    if ($lastID) 
    {
        $idNum = intval(substr($lastID['room_id'], 1)) + 1; // Extract the numeric part and increment
        return 'R' . str_pad($idNum, 3, '0', STR_PAD_LEFT); 
    } else {
        return 'R001'; // Default ID if no records exist
    }
    }
    
    // Generate the Feedback ID
    $newRoomID = generateRoomID($dbc);
    // Insert room assignment into the database
    $insertRoomQuery = "INSERT INTO `room` (`room_id`, `Student_ID`, `Room_Block`, `Room_Floor`, `House_Number`, `Room_Number`, `Room_Type`, `Student_Letter`) 
                        VALUES ('$newRoomID', '$studentID', '$roomBlock', '$roomFloor', '$houseNumber', '$roomNumber', '$studentDisability', '$studentLetter')";
    
    if (mysqli_query($dbc, $insertRoomQuery)) {
        echo '<script>alert("Room successfully assigned!");</script>';
        echo '<script>window.location.assign("frmStudFee.php");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($dbc) . '");</script>';
        echo '<script>window.location.assign("frmStudRoom.php");</script>';
    }
}

// Close the database connection
mysqli_close($dbc);
?>
