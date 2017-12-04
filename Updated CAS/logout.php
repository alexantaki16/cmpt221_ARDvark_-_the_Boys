<?php
session_start();
session_destroy();
echo 'You Have Been Successfully Logged Out. <a href="login.php">Go Back To Admin Login</a>';
?>
