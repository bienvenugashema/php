<?php
include 'config.php';

if (isset($_GET['token'])) {
    $token = mysqli_real_escape_string($conn, $_GET['token']);

    $query = "SELECT * FROM pending_users WHERE token='$token'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Move user from `pending_users` to `users`
        $insert_query = "INSERT INTO users (email, password, address, city, zip) 
                         VALUES ('{$user['email']}', '{$user['password']}', '{$user['address']}', '{$user['city']}', '{$user['zip']}')";
        mysqli_query($conn, $insert_query);

        // Delete from `pending_users`
        $delete_query = "DELETE FROM pending_users WHERE token='$token'";
        mysqli_query($conn, $delete_query);

        echo "<script>alert('Email verified! You can now log in.'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Invalid verification link!')</script>";
    }
} else {
    echo "<script>alert('No token provided!')</script>";
}
?>
