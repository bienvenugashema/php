<?php
include 'config.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    // Check if token is valid
    $check_token = mysqli_query($conn, "SELECT * FROM users WHERE reset_token='$token' LIMIT 1");

    if(mysqli_num_rows($check_token) > 0){
        if(isset($_POST['reset_password'])){
            $new_password = sha1($_POST['password']);

            // Update password and remove token
            mysqli_query($conn, "UPDATE users SET password='$new_password', reset_token=NULL WHERE reset_token='$token'");
            
            echo "<script>alert('Password reset successfully! You can now log in.'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid or expired token!'); window.location='login.php';</script>";
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Reset Password</h3>
                    <form method="post">
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="reset_password" class="btn btn-primary w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
