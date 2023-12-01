<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$userId = 0;
$userName = "User";
$userEmail = "user@gmail.com";
$userPrevilege = 0;
$userPhoneNumber = 0000000000;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if specific session variables exist
if (isset($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phNumber'])) {
    $userId = $_SESSION['id'];
    $userName = $_SESSION['name'];
    $userEmail = $_SESSION['email'];
    $userPrevilege = $_SESSION['previlege'];
    $userPhoneNumber = $_SESSION['phNumber'];
}



// !======================= READ Operation =======================
$sql = "SELECT id, category, date FROM category";
$result = $conn->query($sql);

// $sqlSubcategory = "SELECT * FROM subcategory";
// $resultSubcategory = $conn->query($sqlSubcategory);


if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit(); // Ensure no further code execution after redirection
}


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

        #login a:hover::after,
        #buttons a:hover::after {
            transform-origin: right;
            transform: scaleX(0);
        }

        #OuterProfile {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 40px;
            width: 40px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 20px;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.4);
            background-color: rgba(0, 0, 0, 0.1);
            margin-left: 40px;
            cursor: pointer;
        }

        #outerlayer {
            position: absolute;
            inset: 0;
            height: 100vh;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 10;
        }

        #userProfile {
            min-height: 200px;
            width: 230px;
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.4);
            margin-top: 5px;
            padding: 10px;
            position: absolute;
            right: 20px;
            top: 60px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            z-index: 10000;
        }

        #userProfile p {
            width: 90%;
            margin: auto;
        }

        .topdata {
            display: flex;
            gap: 10px;
        }

        .topdata .imageProfile {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 35px;
            width: 35px;
            border-radius: 50%;
            font-weight: 600;
            font-size: 20px;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.4);
            background-color: rgba(0, 0, 0, 0.1);
        }

        #userName {
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            color: rgba(0, 0, 0, 0.7);
            letter-spacing: 0.02rem;
        }

        #userEmail {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            color: rgba(0, 0, 0, 0.7);
        }

        #userProfile p {
            font-family: Arial, Helvetica, sans-serif;
            text-align: justify;
            letter-spacing: 1px;
            color: rgba(0, 0, 0, 0.7);
        }

        #buttons {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        #buttons div {
            list-style: none;
            display: flex;
        }

        #buttons div a {
            width: 100%;
            width: 250px;
            text-decoration: none;
            border: 1px solid blue;
            padding: 8px 12px;
            border-radius: 3px;
            letter-spacing: 1px;
            background-color: rgba(0, 0, 255, 0.3);
            transition: 0.2s;
            color: black;
            font-size: 14px;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            text-align: center;
        }

        #buttons div a:hover {
            background-color: rgba(0, 0, 255, 0.8);
            color: rgb(255, 255, 255);
        }

        .danger {
            border: 1px solid red !important;
            background-color: rgba(255, 0, 0, 0.3) !important;
            margin-bottom: 10px
        }

        .danger:hover {
            background-color: rgba(255, 0, 0, 0.7) !important;
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
                <?php
                echo $userId < 1 ? '
                    <div id="login">
                        <a href="./auth/login.php">Login</a>
                    </div>
                ' : '
                    <div id="profile">
                        <div id="OuterProfile" onclick="profileClick()">' . strtoupper(substr($userName, 0, 1)) . '</div>
                        <div id="outerlayer">
                            <div id="userProfile">
                                <div class="topdata">
                                    <div class="imageProfile">' . strtoupper(substr($userName, 0, 1)) . '</div>
                                    <div class="userData">
                                        <div id="userName">' . $userName . '</div>
                                        <div id="userEmail">' . $userEmail . '</div>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, laboriosam?
                                </p>
                                <div id="buttons">
                                    <div><a href="#">Your Orders</a></div>
                                    <div><a href="?logout=' . $userId . '" class="danger">Logout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                ?>

            </ul>
        </nav>
    </header>
    <!-- For body part -->
    <script>
        // const onHoverFunction = (id) => {
        //     console.log(id);
        // };

        const outerlayer = document.getElementById("outerlayer");

        function profileClick() {
            if (outerlayer.style.display === "" || outerlayer.style.display === "none") {
                outerlayer.style.display = "block";
            } else {
                outerlayer.style.display = "none";
            }
        }

        outerlayer.addEventListener('click', () => {
            outerlayer.style.display = "none";
        });

        const userProfile = document.getElementById("userProfile");

        userProfile.addEventListener('click', (event) => {
            // Prevent the click event from reaching the outer layer
            event.stopPropagation();
        });
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