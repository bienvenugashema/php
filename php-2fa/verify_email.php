<?php
include 'config.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    
    // Check if token exists
    $check_token = mysqli_query($conn, "SELECT * FROM users WHERE verify_token='$token' LIMIT 1");

    if(mysqli_num_rows($check_token) > 0){
        $update_query = "UPDATE users SET verified=1, verify_token=NULL WHERE verify_token='$token'";
        mysqli_query($conn, $update_query);

        echo "<script>alert('Email verified successfully! You can now log in.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Invalid or expired token!'); window.location='register.php';</script>";
    }
} else {
    header("Location: login.php");
    exit();
}
?>
