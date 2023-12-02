<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$products = 0;
$messages = 0;
$users = 0;
$category = 0;

// Count total number of products
$productQuery = "SELECT COUNT(*) AS total_products FROM producttable";
$productResult = $conn->query($productQuery);
if ($productResult) {
  $productRow = $productResult->fetch_assoc();
  $products = $productRow['total_products'];
}

// Count total number of messages
$messageQuery = "SELECT COUNT(*) AS total_messages FROM contact";
$messageResult = $conn->query($messageQuery);
if ($messageResult) {
  $messageRow = $messageResult->fetch_assoc();
  $messages = $messageRow['total_messages'];
}

// Count total number of users
$userQuery = "SELECT COUNT(*) AS total_users FROM user";
$userResult = $conn->query($userQuery);
if ($userResult) {
  $userRow = $userResult->fetch_assoc();
  $users = $userRow['total_users'];
}

// Count total number of categories
$categoryQuery = "SELECT COUNT(*) AS total_categories FROM category";
$categoryResult = $conn->query($categoryQuery);
if ($categoryResult) {
  $categoryRow = $categoryResult->fetch_assoc();
  $category = $categoryRow['total_categories'];
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sajha Subidha</title>
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/dashboards.css" />
</head>

<body>
  <div id="Navigations">
    <?php include './TopNavigation.php' ?>

    <div id="sideNav">
      <ul>
        <li><a href="./" class="active">Dashboard</a></li>
        <li><a href="./category.php">Category</a></li>
        <li><a href="./subcategory.php">Subcategory</a></li>
        <li><a href="./products.php">Products</a></li>
        <li><a href="./contact.php">Messages</a></li>
        <li><a href="./users.php">Users</a></li>
      </ul>
      <div id="footerC">
        <hr />
        <div>
          Copyright &copy; all rights reserved 2024 from sajha subidha
        </div>
      </div>
    </div>
  </div>
  <div id="container">
    <div id="containerContent">
      <div class="cards">
        <a href="./products.php" class="card">
          <div class="left">
            <h2>Total Products</h2>
            <h3>
              <?php echo $products ?>
            </h3>
          </div>
          <div class="right">
            <div class="top">
              <?php include './svg/product.svg'; ?>
            </div>
            <div class="down">
              <?php include './svg/add.svg'; ?>
            </div>
          </div>
        </a>
        <a href="./contact.php" class="card">
          <div class="left">
            <h2>Messages</h2>
            <h3>
              <?php echo $messages ?>
            </h3>
          </div>
          <div class="right">
            <div class="top">
              <?php include './svg/message.svg'; ?>
            </div>
            <div class="down">
              <?php include './svg/add.svg'; ?>
            </div>
          </div>
        </a>
        <a href="./users.php" class="card">
          <div class="left">
            <h2>
              Users
            </h2>
            <h3>
              <?php echo $users ?>
            </h3>
          </div>
          <div class="right">
            <div class="top">
              <?php include './svg/user.svg'; ?>
            </div>
            <div class="down">
              <?php include './svg/add.svg'; ?>
            </div>
          </div>
        </a>
        <a href="./category.php" class="card">
          <div class="left">
            <h2>Categories</h2>
            <h3>
              <?php echo $category ?>
            </h3>
          </div>
          <div class="right">
            <div class="top">
              <?php include './svg/category.svg'; ?>
            </div>
            <div class="down">
              <?php include './svg/add.svg'; ?>
            </div>
          </div>
        </a>
      </div>
      <div class="containerCard">

      </div>
    </div>
  </div>
  <!-- ===================== for modal ================== -->
  <script src="https://kit.fontawesome.com/8cd30011d8.js" crossorigin="anonymous"></script>
</body>

</html>