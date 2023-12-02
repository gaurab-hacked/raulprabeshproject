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
            $privilege = 0;
            if ($email == "admin@gmail.com") {
                $privilege = 1;
            }
            $query = "INSERT INTO user (name, email, phNumber, password, privilege) VALUES ('$name', '$email', '$phone_no', '$password', '$privilege')";

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
</head>

<body>
    <div class="signup-box">
        <h1>Sign-up</h1>
        <div class="form">
            <form class="signup-form" action="" method="POST" autocomplete="off">
                <!-- For Name -->
                <input type="text" placeholder="Full Name" required class="input-field" name="name" id="name">

                <!-- For Phone number -->
                <input type="number" placeholder="Phone number" required maxlength="10" class="input-field"
                    name="phone_no" id="phone_no">

                <!-- For Email -->
                <input type="email" placeholder="Email" required class="input-field" name="email" id="email">

                <!-- For Password -->
                <input type="password" name="password" placeholder="Password" required class="input-field"
                    id="password">
                <input type="password" name="confirm_password" placeholder="Re-enter Password" required
                    class="input-field">

                <!-- For button -->
                <button type="submit" name="submit">Register</button>
            </form>
            <div class="msgme">
                <p class="message">Already Have Account? <a href="login.php">Login account</a></p>
                <p class="message HomeGo">Dont want to login? <a href="../">Go Home</a></p>
            </div>
        </div>
    </div>
    <!-- <script src="script.js"></script> -->
</body>

</html>