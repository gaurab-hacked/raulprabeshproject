<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if email or phone number already exists
    $duplicate = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email' OR phNumber='$phone_no'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Email or phone number is already taken');</script>";
    } else {
        // Check if password matches the confirm password
        if ($password == $confirm_password) {
            $privilege = ($email == "admin@gmail.com") ? 1 : 0;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO user (name, email, phNumber, password, privilege) VALUES ('$name', '$email', '$phone_no', '$hashed_password', '$privilege')";

            if (mysqli_query($conn, $query)) {
                // Fetch the user details after registration
                $user_id = mysqli_insert_id($conn);
                $user_query = mysqli_query($conn, "SELECT * FROM `user` WHERE id='$user_id'");
                $user = mysqli_fetch_assoc($user_query);

                // Start the session and store user information
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['phNumber'] = $user['phNumber'];
                $_SESSION['privilege'] = $user['privilege'];

                echo "<script>alert('Registration has been successful 😊');</script>";
                header("Location: ../");
                exit();
            } else {
                echo "<script>alert('An error occurred while registering. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match. Please re-enter the correct password.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="./css/registersss.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            text-align: start;
            margin-top: -5px;
        }
    </style>
</head>

<body>
    <div class="signup-box">
        <h1>Sign-up</h1>
        <div class="form">
            <form class="signup-form" action="" method="POST" autocomplete="off">
                <!-- For Name -->
                <input type="text" placeholder="Full Name" class="input-field" name="name" id="name">
                <p class="error-message" id="name-error"></p>

                <!-- For Phone number -->
                <input type="tel" placeholder="Phone number" pattern="[0-9]{10}" class="input-field" name="phone_no"
                    id="phone_no">
                <p class="error-message" id="phone-no-error"></p>

                <!-- For Email -->
                <input type="email" placeholder="Email" class="input-field" name="email" id="email">
                <p class="error-message" id="email-error"></p>

                <!-- For Password -->
                <input type="password" name="password" placeholder="Password" class="input-field" id="password">
                <p class="error-message" id="password-error"></p>

                <input type="password" name="confirm_password" placeholder="Re-enter Password" class="input-field">
                <p class="error-message" id="confirm-password-error"></p>

                <!-- For button -->
                <button type="submit" name="submit">Register</button>
            </form>
            <div class="msgme">
                <p class="message">Already Have Account? <a href="login.php">Login account</a></p>
                <p class="message HomeGo">Don't want to login? <a href="../">Go Home</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get form and input elements
            var signupForm = document.querySelector('.signup-form');
            var nameInput = document.getElementById('name');
            var phoneInput = document.getElementById('phone_no');
            var emailInput = document.getElementById('email');
            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.querySelector('input[name="confirm_password"]');

            // Add event listener to form on submit
            signupForm.addEventListener('submit', function (event) {
                // Remove existing error messages
                clearErrorMessages();

                // Check if name is at least 3 characters long
                if (nameInput.value.trim().length < 3) {
                    event.preventDefault();
                    displayErrorMessage(nameInput, 'Name must be at least 3 characters long.', 'name-error');
                }

                // Check if phone number is exactly 10 digits
                if (phoneInput.value.trim().length !== 10) {
                    event.preventDefault();
                    displayErrorMessage(phoneInput, 'Phone number must be exactly 10 digits long.', 'phone-no-error');
                }

                // Check if email matches the specified regular expression
                if (!isValidEmail(emailInput.value.trim())) {
                    event.preventDefault();
                    displayErrorMessage(emailInput, 'Please enter a valid email.', 'email-error');
                }

                // Check if password is at least 6 characters long
                if (passwordInput.value.length < 6) {
                    event.preventDefault();
                    displayErrorMessage(passwordInput, 'Password must be at least 6 characters long.', 'password-error');
                }

                // Check if password and confirm password match
                if (passwordInput.value !== confirmPasswordInput.value) {
                    event.preventDefault();
                    displayErrorMessage(confirmPasswordInput, 'Passwords do not match.', 'confirm-password-error');
                }
            });

            // Function to display error messages
            function displayErrorMessage(inputField, message, errorId) {
                var errorMessage = document.getElementById(errorId);
                errorMessage.textContent = message;
                inputField.classList.add('error-input');
            }

            // Function to clear error messages
            function clearErrorMessages() {
                var errorMessages = document.querySelectorAll('.error-message');
                errorMessages.forEach(function (errorMessage) {
                    errorMessage.textContent = '';
                });

                var errorInputs = document.querySelectorAll('.error-input');
                errorInputs.forEach(function (errorInput) {
                    errorInput.classList.remove('error-input');
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