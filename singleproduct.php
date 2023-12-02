<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$productId = isset($_GET['view-product']) ? mysqli_real_escape_string($conn, $_GET['view-product']) : 0;

$sqlProduct = "SELECT c.category AS category, c.id AS categoryId, s.subcategory AS subcategory, s.id AS subcategoryId,
                      p.id AS productId, p.name AS productName, p.description AS productDescription, 
                      p.image, p.date, p.userId, p.id AS id, p.phnumber AS phnumber, p.address AS address
                  FROM producttable AS p
                  LEFT JOIN category AS c ON c.id = p.categoryId
                  LEFT JOIN subcategory AS s ON s.id = p.subcategoryId
                  WHERE p.id='$productId'";

// Perform the query
$resultProduct = $conn->query($sqlProduct);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahaj-Subidha</title>
    <link rel="stylesheet" href="./css/style111.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/singleProduct.css">
</head>

<body>
    <?php include "./common/Navigation.php" ?>
    <div id="single-page-container">
        <div id="content-container">
            <?php
            if ($resultProduct->num_rows > 0) {
                $serialNumber = 1;
                while ($row = $resultProduct->fetch_assoc()) {
                    echo '
                    <img  src="http://localhost/SahajSubidha/dashboard/' . $row['image'] . '">
                    <div class="contentSingle">
                        <h2>' . $row['productName'] . '</h2>
                        <p>' . $row['productDescription'] . '</p>
                        <p>Phone Number: ' . $row['phnumber'] . '</p>
                        <p>Address: ' . $row['address'] . '</p>
                        <a href="http://localhost/SahajSubidha/dashboard/' . $row['image'] . '" download>Download Image</a>
                    </div>
            ';
                }
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>