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

// $sqlSubcategory = "SELECT * FROM subcategory";
// $resultSubcategory = $conn->query($sqlSubcategory);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/navigations.css">
    <style>
        .nav-menu {
            display: flex;
            align-items: center;
            height: 100%;
        }

        #login {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 30px;
        }

        #login a {
            border: 1px solid blue;
            padding: 6px 12px;
            border-radius: 3px;
            letter-spacing: 1px;
            background-color: rgba(0, 0, 255, 0.2);
            transition: .2s;
            font-size: 14px;
        }

        #login a:hover {
            background-color: rgba(0, 0, 255, 0.4);
            color: black;
        }

        #login a:hover::after {
            transform-origin: right;
            transform: scaleX(0);
        }
    </style>
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
                        $categoryLink = strtolower($row['category']) == "home" ? './index' : './' . $row['category'];
                        $words = explode(' ', $categoryLink);
                        if ($categoryLink == './about us') {
                            $hrefValue = 'about';
                        } elseif ($categoryLink == './contact us') {
                            $hrefValue = 'contact';
                        } else {
                            $hrefValue = $words[0];
                        }
                        echo '<li class="dropdown">
            <a href="' . $hrefValue . '.php" class="dropbtn" onmouseover="onHoverFunction(' . $row['id'] . ')">' . $row['category'] . '</a>
            <div class="dropdown-content"></div></li>';
                    }
                }
                ?>
                <div id="login">
                    <a href="./auth/login.php">Login</a>
                </div>
            </ul>
        </nav>
    </header>
    <!-- For body part -->
    <script>
        const onHoverFunction = (id) => {
            console.log(id)
        }
    </script>
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