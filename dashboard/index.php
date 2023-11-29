<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sajha Subidha</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/dashboard.css" />
</head>

<body>
  <div id="Navigations">
    <div id="topNav">
      <nav>
        <div id="Logo">Sajha Subidha</div>
        <div id="Greeting">Hello Admin, Good Morning!!!</div>
        <div id="searchItem">
          <form action="#">
            <input type="text" name="search" id="search" placeholder="Search..." />
            <button type="submit">search</button>
          </form>
        </div>
        <div id="profile"></div>
      </nav>
    </div>
    <div id="sideNav">
      <ul>
        <li><a href="./" class="active">Dashboard</a></li>
        <li><a href="./category.php">Category</a></li>
        <li><a href="./subcategory.php">Subcategory</a></li>
        <li><a href="./products.php">Products</a></li>
        <li><a href="./orders.php">Orders</a></li>
        <li><a href="./delivery.php">Delivery</a></li>
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