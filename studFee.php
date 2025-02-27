<?php

session_start(); // Start the session at the top of the script
include 'dbc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $feeSession = mysqli_real_escape_string($dbc, $_POST['fSession']);
    $totalElectrical = intval($_POST['fElectrical']);
    $feeDate = mysqli_real_escape_string($dbc, $_POST['feeDate']);
    $paymentMethod = mysqli_real_escape_string($dbc, $_POST['paymentMethod']);
    $studentID = mysqli_real_escape_string($dbc, $_POST['studentID']);
    
    // Calculate total fee
    $collegeFee = 420;
    $electricalFee = $totalElectrical * 10;
    $totalFee = $collegeFee + $electricalFee;

    // Handle file upload for Fee Reason
    $feeReasonFile = '';
    if (!empty($_FILES['stdReason']['name'])) {
        $targetDir = "uploads/"; // Directory to store uploaded files
        $fileName = basename($_FILES['stdReason']['name']);
        $targetFilePath = $targetDir . $fileName;
        
        if (move_uploaded_file($_FILES['stdReason']['tmp_name'], $targetFilePath)) {
            $feeReasonFile = $targetFilePath; // Store file path in DB
        }
    }

    // Store selected equipment types
    $equipmentTypes = isset($_POST['equipment']) && is_array($_POST['equipment']) ? implode(', ', $_POST['equipment']) : '';

    // Auto-generate Feedback ID
    function generateFeeID($dbc) {
        $query = "SELECT `Fee_Num` FROM `fee` ORDER BY `Fee_Num` DESC LIMIT 1;";
        $result = mysqli_query($dbc, $query);
        $lastID = mysqli_fetch_array($result);

        if ($lastID)
        {
            $idNum = intval(substr($lastID['Fee_Num'], 1)) + 1; // Extract the numeric part and increment
            return 'G' . str_pad($idNum, 3, '0', STR_PAD_LEFT); 
        } else {
            return 'G001'; // Default ID if no records exist
        }
    }
    // Generate the Feedback ID
    $feeID = generateFeeID($dbc);

    // Insert data into database
    $insertFeeQuery = "INSERT INTO fee (Fee_Num, Fee_Session, Fee_Electrical, Fee_CollegeAmount, Fee_Tot, Fee_Reason, Fee_Equip, Fee_Date, Fee_Status, Student_ID) 
                        VALUES ('$feeID', '$feeSession', '$totalElectrical', '$collegeFee', '$totalFee', '$feeReasonFile', '$equipmentTypes', '$feeDate', 'Pending', '$studentID')";

    if (mysqli_query($dbc, $insertFeeQuery)) {
        echo '<script>alert("Fee record added successfully!"); window.location.href = "frmStudFeed.php";</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($dbc) . '"); window.history.back();</script>';
    }

    // Close database connection
    mysqli_close($dbc);
}
?>
