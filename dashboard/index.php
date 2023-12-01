<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sajha Subidha</title>
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/dashboard.css" />
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
      <div id="content">Dashboard</div>
    </div>
  </div>
  <!-- ===================== for modal ================== -->
  <script src="https://kit.fontawesome.com/8cd30011d8.js" crossorigin="anonymous"></script>
</body>

</html>