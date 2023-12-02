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

$userName = "";
$userEmail = "";
$userTitle = "";
$userDes = "";


if (isset($_GET["view"])) {
  $viewId = $_GET["view"];
  $sqlOne = "SELECT * FROM contact WHERE id='$viewId'";
  $resultOne = $conn->query($sqlOne);
  if ($resultOne->num_rows > 0) {
    $row = $resultOne->fetch_assoc();
    $userName = $row['name'];
    $userEmail = $row['email'];
    $userTitle = $row['title'];
    $userDes = $row['description'];
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
  <style>
    #contentContact {
      padding: 10px;
      display: flex;
      gap: 6px;
      flex-direction: column;
    }

    #contentContact div {
      box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.2);
      padding: 7px;
      border-radius: 3px;
      font-family: Arial, Helvetica, sans-serif;
    }

    #modalContentLayer {
      height: 100%;
      min-height: 275px;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 500px;
    }

    #Modal {
      height: unset;
    }
  </style>
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
              <th colspan="2">Action</th>
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
            <td><a href="?view=' . $row['id'] . '">' . file_get_contents("./svg/eye.svg") . '</a></td>
            <td><a href="?delete=' . $row['id'] . '">' . file_get_contents("./svg/delete.svg") . '</a></td>
        </tr>';
              }
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>

    <!-- ===================== for modal ================== -->
    <div id="modalHiddenBlock">
      <div id="modalOuterLayer">
        <div id="modalContentLayer">
          <div id="Modal">
            <div id="modalHead">
              <p style="text-transform: capitalize;">Message From
                <?php echo $userName ?>
              </p>
              <div onclick="closeModal()">X</div>
            </div>
            <hr />
            <div id="contentContact">
              <div>Name:
                <?php echo $userName ?>
              </div>
              <div>Email:
                <?php echo $userEmail ?>
              </div>
              <div>Title:
                <?php echo $userTitle ?>
              </div>
              <div>Description:
                <?php echo $userDes ?>
              </div>
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
        urlParams.delete('view');

        const newUrl = window.location.pathname + '?' + urlParams.toString();
        history.replaceState({}, document.title, newUrl);
        location.reload();
      };

      const urlParams = new URLSearchParams(window.location.search);
      const viewParam = urlParams.get('view');

      if (viewParam) {
        ModalOpen();
      }

    </script>
  </div>
</body>

</html>