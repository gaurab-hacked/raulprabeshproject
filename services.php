<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// ?======== for product ============
// Your SQL query
$sqlProduct = "SELECT c.category AS category, c.id AS categoryId, s.subcategory AS subcategory, s.id AS subcategoryId,
                      p.id AS productId, p.name AS productName, p.description AS productDescription, 
                       p.image, p.date, p.userId, p.id AS id, p.phnumber AS phnumber, p.address AS address
                      FROM
    producttable AS p
LEFT JOIN
    category AS c ON c.id = p.categoryId
LEFT JOIN
    subcategory AS s ON s.id = p.subcategoryId
    ";

// Perform the query
$resultProduct = $conn->query($sqlProduct);

if (isset($_GET['service'])) {
  $services = str_replace('+', ' ', $_GET['service']);

  // Your SQL query
  $sqlProduct = "SELECT c.category AS category, c.id AS categoryId, s.subcategory AS subcategory, s.id AS subcategoryId,
      p.id AS productId, p.name AS productName, p.description AS productDescription, 
      p.image, p.date, p.userId, p.id AS id, p.phnumber AS 
      FROM
      producttable AS p
      LEFT JOIN
      category AS c ON c.id = p.categoryId
      LEFT JOIN
      subcategory AS s ON s.id = p.subcategoryId
      WHERE s.subcategory LIKE '%$services%'";

  // Perform the query
  $resultProduct = $conn->query($sqlProduct);
}


// !============================ for search query ========================
if (isset($_GET['search'])) {
  $searchContent = $_GET['search'];

  // Your SQL query
  $sqlProduct = "SELECT c.category AS category, c.id AS categoryId, s.subcategory AS subcategory, s.id AS subcategoryId,
                      p.id AS productId, p.name AS productName, p.description AS productDescription, 
                       , p.image, p.date, p.userId, p.id AS id, p.phnumber AS phnumber, p.address AS address
                      FROM
    producttable AS p
LEFT JOIN
    category AS c ON c.id = p.categoryId
LEFT JOIN
    subcategory AS s ON s.id = p.subcategoryId
WHERE
    p.name LIKE '%$searchContent%'
    ";

  // Perform the query
  $resultProduct = $conn->query($sqlProduct);
}

$sqlSubcategory = "SELECT sub.* FROM subcategory sub JOIN category cat ON sub.categoryId = cat.id WHERE cat.category LIKE '%services%'";

$resultSubcategory = $conn->query($sqlSubcategory);


?>

<!DOCTYPE html>
<html>

<head>
  <title>Job Descriptions</title>
  <link rel="stylesheet" href="./css/style111.css">
  <link rel="stylesheet" href="./css/Service.css">
  <style>
    .dropdown-content {
      border-radius: 3px;
    }

    .dropdown-content a {
      font-size: 13px;
      text-transform: capitalize;
      font-weight: 500;
    }

    .dropdown-content a:hover {
      background-color: rgba(0, 0, 0, .1);
    }

    .dropbtn {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 4px;
    }

    .dropbtn svg {
      height: 12px;
      width: 14px;
      fill: white;
    }
  </style>
</head>

<body>


  <?php include "./common/Navigation.php" ?>
  <div class="other-services">
    <div style="padding-top: 80px;"></div>
    <div class="contentServiceAll">
      <hr>
      <div class="mid">
        <h2 id="serviceHeader">Services</h2>
        <div class="flex">
          <div class="dropdown">
            <button class="dropbtn"><span>Select Services</span>
              <?php include "./images/downarrow.svg" ?>
            </button>
            <div class="dropdown-content">
              <?php
              if ($resultSubcategory->num_rows > 0) {
                while ($subRow = $resultSubcategory->fetch_assoc()) {
                  $encodedSubcategory = urlencode($subRow['subcategory']);
                  echo '<a href="?service=' . $encodedSubcategory . '">' . $subRow['subcategory'] . '</a>';
                }
              }
              ?>
            </div>
          </div>
          <form>
            <input type="text" name="search" id="search" placeholder="Search Services...">
            <button type="submit">Search</button>
          </form>
        </div>
      </div>
      <hr>
      <div class="allservices" style="min-height: 80vh;">
        <?php
        if ($resultProduct->num_rows > 0) {
          $serialNumber = 1;
          while ($row = $resultProduct->fetch_assoc()) {
            $productDescription = $row['productDescription'];
            $limitedDescription = strlen($productDescription) > 50 ? substr($productDescription, 0, 50) . '...' : $productDescription;

            echo '
        <div class="card" style="max-width: 350px; height: 350px; overflow:hidden;">
            <img src="http://localhost/SahajSubidha/dashboard/' . $row['image'] . '">
            <div class="card-content">
                <div style="height: 115px; overflow: hidden;">
                    <h2 style="font-size: 19px;">' . $row['productName'] . '</h2>
                    <p>' . $limitedDescription . '</p>
                    <div id="detail">
                      <p>Number: ' . $row['phnumber'] . '</p>
                      <p>Address: ' . $row['address'] . '</p>
                    </div>
                </div>
                <a href="./singleproduct.php?view-product=' . $row['id'] . '" class="order-btn">View More</a>
            </div>
        </div>';
          }
        }
        ?>
      </div>
    </div>

  </div>
  <footer>
    <div class="footer-bottom">
      <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
    </div>
  </footer>


  <script>
    // Get the current URL parameter
    var urlParams = new URLSearchParams(window.location.search);
    var serviceParam = urlParams.get('service');

    // Decode and replace '+' with space
    var decodedService = decodeURIComponent(serviceParam.replace(/\+/g, ' '));
    const serviceHeader = document.getElementById("serviceHeader")
    serviceHeader.innerText = decodedService
  </script>



</body>

</html>