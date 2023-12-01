<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//!================ CREATE Operation =======================
if (isset($_POST['postcategory'])) {
  $category = $_POST['category'];
  $sql = "INSERT INTO category (category) VALUES ('$category')";
  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    header("Location: ./category.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// !======================= READ Operation =======================
$sql = "SELECT id, category, date FROM category";
$result = $conn->query($sql);

// !======================= UPDATE Operation =======================
$categoryName = "";
$categoryId = "";
if (isset($_GET['edit'])) {
  $editId = $_GET['edit'];
  $sqlEditOne = "SELECT id, category, date FROM category WHERE id = $editId";
  $resultEditOne = $conn->query($sqlEditOne);
  if ($resultEditOne->num_rows > 0) {
    $row = $resultEditOne->fetch_assoc();
    $categoryName = $row["category"];
    $categoryId = $row["id"];
  }
}
if (isset($_POST['updatecategory'])) {
  $newCategory = $_POST['category'];
  $idToUpdate = $_POST['updateid'];
  $sql = "UPDATE category SET category='$newCategory' WHERE id=$idToUpdate";

  if ($conn->query($sql) === TRUE) {
    // echo "Record updated successfully";
    header("Location: ./category.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// !======================= DELETE Operation =======================
if (isset($_GET['delete'])) {
  $idToDelete = $_GET['delete'];
  $sql = "DELETE FROM category WHERE id=$idToDelete";

  if ($conn->query($sql) === TRUE) {
    header("Location: ./category.php");
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
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
  <link rel="stylesheet" href="./styles/category.css" />
</head>

<body>
  <div id="Navigations">
    <?php include './TopNavigation.php' ?>
    <div id="sideNav">
      <ul>
        <li><a href="./">Dashboard</a></li>
        <li><a href="./category.php" class="active">Category</a></li>
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
      <div id="content">
        <div id="pageHeader">
          <button onclick="ModalOpen()">Add Category</button>
          <div id="NavigationContent">
            <a href="#">Dashboard</a> / <a href="#">Category</a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>S.N</th>
              <th>Category Name</th>
              <th>Date</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $num = 1;

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '
        <tr>
            <td>' . $num . '</td>
            <td>' . $row["category"] . '</td>
            <td>' . $row["date"] . '</td>
            <td><a href="?edit=' . $row['id'] . '" onclick="ModalOpen()">' . file_get_contents("./svg/edit.svg") . '</a></td>
            <td><a href="?delete=' . $row['id'] . '">' . file_get_contents("./svg/delete.svg") . '</a></td>
        </tr>
        ';
                $num++;
              }
            }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- ===================== for modal ================== -->
  <div id="modalHiddenBlock">
    <div id="modalOuterLayer">
      <div id="modalContentLayer">
        <div id="Modal">
          <div id="modalHead">
            <p>Add Category</p>
            <div onclick="closeModal()">X</div>
          </div>
          <hr />
          <div id="modalBody">
            <form action="./category.php" method="post">
              <input type="text" name="category" id="category" placeholder="Category Name"
                value="<?php echo htmlspecialchars($categoryName); ?>" />
              <input type="hidden" name="updateid" value="<?php echo htmlspecialchars($categoryId); ?>">
              <div id="FormButtons">
                <button type="reset" id="resetContent">Reset</button>
                <?php echo !isset($_GET['edit']) ? '
                <button type="submit" id="postContent" name="postcategory">Post</button>
                ' : '
                <button type="submit" id="postContent" name="updatecategory">Update</button>
                ' ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const modalHiddenBlock = document.getElementById("modalHiddenBlock");

    const ModalOpen = () => {
      if (modalHiddenBlock.style.display === "" || modalHiddenBlock.style.display === "none") {
        modalHiddenBlock.style.display = "block";
      } else {
        modalHiddenBlock.style.display = "none";
      }
    };

    const closeModal = () => {
      modalHiddenBlock.style.display = "none";
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.delete('edit');

      const newUrl = window.location.pathname + '?' + urlParams.toString();
      history.replaceState({}, document.title, newUrl);
      location.reload();
    };

    const urlParams = new URLSearchParams(window.location.search);
    const editParam = urlParams.get('edit');

    if (editParam) {
      ModalOpen();
    }

  </script>
</body>

</html>