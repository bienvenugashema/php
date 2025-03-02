
<?php
include 'config.php';
include 'mailer.php';
include 'header.php';
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip = mysqli_real_escape_string($conn, $_POST['zip']);
    $hashed_password = sha1($password);
    $token = md5(uniqid(mt_rand(), true));

    // Check if email is already registered
    $check_email = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email is already taken.')</script>";
    } else {
        // Insert into pending_users
        $query = "INSERT INTO pending_users (email, password, address, city, zip, token) 
                  VALUES ('$email', '$hashed_password', '$address', '$city', '$zip', '$token')";
        if (mysqli_query($conn, $query)) {
            if (sendVerificationEmail($email, $token)) {
                echo "<script>alert('Check your email to verify your account.')</script>";
            } else {
                echo "<script>alert('Error sending email.')</script>";
            }
        } else {
            echo "<script>alert('Registration failed.')</script>";
        }
    }
}
?>


<style>
  .form-container {
    max-width: 600px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the form horizontally */
    padding: 20px; /* Optional: Add some padding for better presentation */
  }
</style>

<div class="form-container">
  <h1>Registration Page</h1>
  <form class="row g-3" method="post" action="register.php">
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">City</label>
      <input type="text" name="city" class="form-control" id="inputCity">
    </div>
    
    <div class="col-md-2">
      <label for="inputZip" class="form-label">Zip</label>
      <input type="text" name="zip" class="form-control" id="inputZip">
    </div>
    <div class="col-12">
      <p>If you have an account, Sign in <a href="login.php">here..</a></p>
      <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </div>
  </form>
</div>
