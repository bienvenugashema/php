<?php 
session_start();
include 'header.php'; 
include 'config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$message = "";

if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = sha1($_POST['password']);

    // Check if email exists and is verified
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password' AND verified=1 LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['email'] = $email;
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $message = "Invalid credentials or email not verified.";
    }
}

// Forgot Password
if(isset($_POST['forgot'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand()); // Generate reset token

    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($check_email) > 0){
        mysqli_query($conn, "UPDATE users SET reset_token='$token' WHERE email='$email'");

        // Send Reset Email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'your_email@gmail.com'; 
            $mail->Password   = 'your_app_password'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('your_email@gmail.com', 'IT Bienvenu');
            $mail->addAddress($email);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Click the link to reset your password: http://localhost/reset_password.php?token=$token";

            $mail->send();
            $message = "Password reset link sent!";
        } catch (Exception $e) {
            $message = "Error: " . $mail->ErrorInfo;
        }
    } else {
        $message = "Email not found!";
    }
}
?>

<style>
  .form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
  }
</style>

<div class="form-container">
  <h1>Login Page</h1>
  
  <?php if($message): ?>
    <div class="alert alert-danger"><?php echo $message; ?></div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail" required>
    </div>
    <div class="mb-3">
      <label for="inputPassword" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword" required>
    </div>
    <p>Don't have an account? Register <a href="register.php">here</a>.</p>
    <button type="submit" name="login" class="btn btn-primary">Sign in</button>
  </form>

  <hr>

  <h2>Forgot Password?</h2>
  <form method="post">
    <div class="mb-3">
      <label for="forgotEmail" class="form-label">Enter your email</label>
      <input type="email" name="email" class="form-control" id="forgotEmail" required>
    </div>
    <button type="submit" name="forgot" class="btn btn-warning">Send Reset Link</button>
  </form>
</div>
