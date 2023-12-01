<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// !======================= READ Operation =======================
$sql = "SELECT id, category, date FROM category";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navigations.css">
</head>

<body>
    <!-- For Logo and nav menu -->
    <header class="header" style="z-index:1000000;">
        <div class="logo">
            <a href="./index.php"><img src="./common/logo.png" alt="Logo: Sahaj-Subidha"></a>
        </div>
        <!-- menu -->
        <nav class="nav-menu">
            <ul>
                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li><a href="./index.php">' . $row['category'] . '</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </header>
    <!-- For body part -->
</body>

</html>




<!-- <li><a href="./about.php">About</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Service</a>
                    <div class="dropdown-content">
                        <a href="./Services/homeservice.php">Home Service</a>
                        <a href="./Services/officeservice.php">Office Service</a>
                        <a href="./Services/emergencyservice.php">Emergency Service</a>
                    </div>
                </li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./auth/login.php">Login</a></li> -->