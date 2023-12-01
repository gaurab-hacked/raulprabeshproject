<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sajha Subidha</title>
  <link rel="stylesheet" href="./styles/style.css" />
  <link rel="stylesheet" href="./styles/subcategorys.css" />
</head>

<body>
  <div id="Navigations">
    <?php include './TopNavigation.php' ?>

    <div id="sideNav">
      <ul>
        <li><a href="./">Dashboard</a></li>
        <li><a href="./category.php">Category</a></li>
        <li><a href="./subcategory.php">Subcategory</a></li>
        <li><a href="./products.php">Products</a></li>
        <li><a href="./orders.php">Orders</a></li>
        <li><a href="./delivery.php" class="active">Delivery</a></li>
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
      <div id="content">
        <div id="pageHeader">
          <div id="NavigationContent">
            <a href="./">Dashboard</a> /
            <a href="./delivery.php">Delivery</a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>S.N</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>This is Title</td>
              <td>This is description i like.</td>
              <td><img style="height: 35px; width: 35px; border-radius: 5px; object-fit: cover;"
                  src="https://m.media-amazon.com/images/M/MV5BYWYyZmNiOTEtODY0Zi00ZDNiLTlhZmMtMzE2Mzk5NGMwYzhlXkEyXkFqcGdeQXVyOTkwNTM4MTk@._V1_.jpg"
                  alt=""></td>
              <td>Gaurab</td>
              <td>Sunar</td>
              <td><a href="#">
                  <?php include "./svg/delivery.svg" ?>
                </a></td>
              <td><a href="#">
                  <?php include "./svg/delete.svg" ?>
                </a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>