<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM contact";
$result = $conn->query($sql);

// !======================= DELETE Operation =======================
if (isset($_GET['delete'])) {
  $idToDelete = $_GET['delete'];
  $sql = "DELETE FROM contact WHERE id=$idToDelete";

  if ($conn->query($sql) === TRUE) {
    header("Location: ./contact.php");
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

?>

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

        <li><a href="./contact.php" class="active">Messages</a></li>
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
            <a href="./contact.php">Messages</a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>S.N</th>
              <th>Name</th>
              <th>Email</th>
              <th>Title</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $num = 1;

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $title = $row['title'];
                $limitedTitle = strlen($title) > 10 ? substr($title, 0, 50) . '...' : $title;

                $description = $row['description'];
                $limitedDescription = strlen($description) > 10 ? substr($description, 0, 50) . '...' : $description;

                echo '
                <tr>
                <td>' . $num++ . '</td>
                <td>' . $row['name'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $limitedTitle . '</td>
            <td>' . $limitedDescription . '</td>
            <td><a href="?delete=' . $row['id'] . '">' . file_get_contents("./svg/delete.svg") . '</a></td>
        </tr>';
              }
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>