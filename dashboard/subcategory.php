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
if (isset($_POST['subcategoryPost'])) {
  $categoryId = $_POST['category'];
  $subcategory = $_POST['Subcategory'];
  $sql = "INSERT INTO subcategory (categoryId, subcategory) VALUES ('$categoryId', '$subcategory')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: ./subcategory.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// !======================= READ Operation =======================
$sqlCategory = "SELECT id, category, date FROM category";
$resultCategory = $conn->query($sqlCategory);

$sqlsubcategory = "
    SELECT
        c.category AS category,
        s.subcategory AS subcategory,
        s.date AS date,
        s.id AS id
    FROM
        subcategory AS s
    JOIN
        category AS c ON s.categoryId = c.id
";

$resultsubcategory = $conn->query($sqlsubcategory);

// !======================= UPDATE Operation =======================
$subcategoryName = "";
$categoryId = "";
$subcategoryId = "";
if (isset($_GET['edit'])) {
  $editId = $_GET['edit'];
  $sqlEditOne = "SELECT * FROM subcategory WHERE id = $editId";
  $resultEditOne = $conn->query($sqlEditOne);
  if ($resultEditOne->num_rows > 0) {
    $row = $resultEditOne->fetch_assoc();
    $categoryId = $row["categoryId"];
    $subcategoryName = $row["subcategory"];
    $subcategoryId = $row["id"];
  }
}
if (isset($_POST['subcategoryUpdate'])) {
  $newCategory = $_POST['category'];
  $newsubcategory = $_POST['Subcategory'];
  $idToUpdate = $_POST['updateid'];
  $sql = "UPDATE subcategory SET subcategory='$newsubcategory', categoryId='$newCategory' WHERE id=$idToUpdate";

  if ($conn->query($sql) === TRUE) {
    // echo "Record updated successfully";
    header("Location: ./subcategory.php");
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// !======================= DELETE Operation =======================
if (isset($_GET['delete'])) {
  $idToDelete = $_GET['delete'];
  $sql = "DELETE FROM subcategory WHERE id=$idToDelete";

  if ($conn->query($sql) === TRUE) {
    header("Location: ./subcategory.php");
    // echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sqlsubcategory = "
    SELECT
        c.category AS category,
        s.subcategory AS subcategory,
        s.date AS date,
        s.id AS id
    FROM
        subcategory AS s
    JOIN
        category AS c ON s.categoryId = c.id WHERE s.subcategory LIKE '%$search%'
";

  $resultsubcategory = $conn->query($sqlsubcategory);

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
  <link rel="stylesheet" href="./styles/subcategorys.css" />
</head>

<body>
  <div id="Navigations">
    <?php include './TopNavigation.php' ?>

    <div id="sideNav">
      <ul>
        <li><a href="./">Dashboard</a></li>
        <li><a href="./category.php">Category</a></li>
        <li><a href="./subcategory.php" class="active">Subcategory</a></li>
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
          <button onclick="ModalOpen()">Add Subcategory</button>
          <div id="NavigationContent">
            <a href="./">Dashboard</a> /
            <a href="./subcategory.php">Subcategory</a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>S.N</th>
              <th>Category Name</th>
              <th>Subcategory Name</th>
              <th>Date</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($resultsubcategory->num_rows > 0) {
              $serialNumber = 1;
              while ($row = $resultsubcategory->fetch_assoc()) {
                echo '
      <tr>
        <td>' . $serialNumber++ . '</td>
        <td>' . $row['category'] . '</td>
        <td>' . $row['subcategory'] . '</td>
        <td>' . $row['date'] . '</td>
        <td><a href="?edit=' . $row['id'] . '" onclick="ModalOpen()">' . file_get_contents("./svg/edit.svg") . '</a></td>
            <td><a href="?delete=' . $row['id'] . '">' . file_get_contents("./svg/delete.svg") . '</a></td>
      </tr>';
              }
            }
            ?>
          </tbody>

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
            <p>Add SubCategory</p>
            <div onclick="closeModal()">X</div>
          </div>
          <hr />
          <div id="modalBody">
            <form action="./subcategory.php" method="post">
              <select name="category" id="categoryDropDOwn">
                <option value="null">Select Category</option>
                <?php
                if ($resultCategory->num_rows > 0) {
                  while ($row = $resultCategory->fetch_assoc()) {
                    $selected = ($row['id'] == $categoryId) ? 'selected' : '';
                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['category'] . '</option>';
                  }
                }
                ?>
              </select>

              <input type="text" name="Subcategory" id="Subcategory" placeholder="Subcategory Name"
                value="<?php echo htmlspecialchars($subcategoryName); ?>" />
              <input type="hidden" name="updateid" value="<?php echo htmlspecialchars($subcategoryId); ?>">
              <div id="FormButtons">
                <button type="reset" id="resetContent">Reset</button>
                <?php echo !isset($_GET['edit']) ? '
                <button type="submit" id="postContent" name="subcategoryPost">Post</button>
                ' : '
                <button type="submit" id="postContent" name="subcategoryUpdate">Update</button>
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