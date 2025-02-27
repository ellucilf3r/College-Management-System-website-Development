<?php
session_start();
session_destroy(); // Destroy the session
echo '<script>alert("You have been Log Out!");</script>';
echo '<script>window.location.assign("frmUser.html");</script>';
exit();
?>
