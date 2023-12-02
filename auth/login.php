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

    if ($user['privilege'] == 1) {
      header("Location: ../dashboard");
    } else {
      header("Location: ../");
    }
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
  <style>
    .error-message {
      color: red;
      margin-top: 5px;
      font-size: 14px;
      width: 100%;
      text-align: start;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="login-box">
      <h1 class="login-heading">Login</h1>
      <form class="login-form" method="post" action="">
        <div class="input-container">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <label for="email"></label>
          <input type="email" name="email" class="input-field" placeholder="Email" />
        </div>
        <div class="input-container">
          <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
          <label for="password"></label>
          <input type="password" name="password" class="input-field" placeholder="Password" />
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
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get form and input elements
      var loginForm = document.querySelector('.login-form');
      var emailInput = document.querySelector('input[name="email"]');
      var passwordInput = document.querySelector('input[name="password"]');

      // Add event listener to form on submit
      loginForm.addEventListener('submit', function (event) {
        // Remove existing error messages
        clearErrorMessages();

        // Check if email is empty or not in a valid format
        if (emailInput.value.trim() === '' || !isValidEmail(emailInput.value)) {
          event.preventDefault();
          displayErrorMessage(emailInput, 'Please enter a valid email.');
        }

        // Check if password is empty or less than 4 characters
        if (passwordInput.value.trim() === '' || passwordInput.value.length < 4) {
          event.preventDefault();
          displayErrorMessage(passwordInput, 'Password must be at least 4 characters.');
        }
      });

      // Function to display error messages
      function displayErrorMessage(inputField, message) {
        var errorMessage = document.createElement('p');
        errorMessage.className = 'error-message';
        errorMessage.textContent = message;
        inputField.parentNode.appendChild(errorMessage);
      }

      // Function to clear error messages
      function clearErrorMessages() {
        var errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function (errorMessage) {
          errorMessage.parentNode.removeChild(errorMessage);
        });
      }

      // Function to validate email format using a regular expression
      function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
      }
    });
  </script>
</body>

</html>