<?php
require 'config.php';

// Check if the session is not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start(); // Start the session
}

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $query = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    // Fetch the user details
    $user = mysqli_fetch_assoc($result);

    // Store user information in session variables
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['privilege'] = $user['privilege'];
    $_SESSION['phNumber'] = $user['phNumber'];

    echo "<script>alert('Login successful');</script>";
    header("Location: ../");
    exit(); // Ensure no further code execution after redirection
  } else {
    echo "<script>alert('Invalid email or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="./css/logins.css" rel="stylesheet">
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <h1 class="login-heading">Login</h1>
      <form class="login-form" method="post" action="">
        <div class="input-container">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <label for="email"></label>
          <input type="email" name="email" class="input-field" placeholder="Email" required />
        </div>
        <div class="input-container">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <label for="password"></label>
          <input type="password" name="password" class="input-field" placeholder="Password" required />
        </div>
        <button class="btn" type="submit" name="submit">Login</button>
      </form>
      <div class="msgme">
        <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        <p class="message HomeGo">Dont want to login? <a href="../">Go Home</a></p>
      </div>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>