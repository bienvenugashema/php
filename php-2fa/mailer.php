<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // If using Composer
// require 'path/to/PHPMailer/src/PHPMailer.php'; // If manually downloaded

function sendVerificationEmail($email, $token) {
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'bienvenugashema@gmail.com'; // Your Gmail
        $mail->Password   = 'oiqq yene gmcz udco'; // Your App Password (Don't share it publicly)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Email Content
        $mail->setFrom('bienvenugashema@gmail.com', 'IT Bienvenu');
        $mail->addAddress($email);
        $mail->Subject = "Verify Your Email";
        $mail->Body    = "Click the link to verify your email: http://localhost/your_project/verify.php?token=$token";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>
