<?php
// Logout logic here
session_start();
session_destroy();
header("Location: login.php");
exit();
?>