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
    subcategory AS s ON s.id = p.subcategoryId LIMIT 10
    ";

// Perform the query
$resultProduct = $conn->query($sqlProduct);


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
    p.name LIKE '%$searchContent%' LIMIT 10
    ";

  // Perform the query
  $resultProduct = $conn->query($sqlProduct);

  // JavaScript code for scrolling down
  echo '<script>
          function scrollDownClkD() {
            window.scrollTo({
              top: window.scrollY + 2000,
              behavior: "smooth"
            });
          }

          // Call the scrollDownClk function when the page loads
          window.onload = function() {
            scrollDownClkD();
          };
        </script>';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sahaj-Subidha</title>
  <link rel="stylesheet" href="./css/style111.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./css/Service.css">
</head>

<body>
  <?php include "./common/Navigation.php" ?>
  <main>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide h1 firstSlide slides">
          <img src="./images/img1.jpg" alt="first hero" class="imageHero">
          <div class="contentHero">
            <div class="content">
              <h2>SAHAJ SUBIDHA</h2>
              <p>"All-in-One: The Ultimate Service Experience"</p>
            </div>
          </div>
        </div>
        <div class="swiper-slide h1 firstSlide slides">
          <img src="./images/img2.jpg" alt="first hero" class="imageHero">
          <div class="contentHero">
            <div class="content">
              <h2>SAHAJ SUBIDHA</h2>
              <p>"All-in-One: The Ultimate Service Experience"</p>
            </div>
          </div>
        </div>
        <div class="swiper-slide h1 firstSlide slides">
          <img src="./images/img3.jpg" alt="first hero" class="imageHero">
          <div class="contentHero">
            <div class="content">
              <h2>SAHAJ SUBIDHA</h2>
              <p>"All-in-One: The Ultimate Service Experience"</p>
            </div>
          </div>
        </div>
      </div>
      <div id="scrollImg">
        <img class="scrollImgTag" src="./images/scroll.gif" alt="" onclick="scrollDownClk()">
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </main>


  <!-- ============================= top services ========================= -->
  <div class="Servicecontainer">
    <div class="maincontainer">
      <div class="mid">
        <h2>Ultimate Services</h2>
      </div>
      <hr>
      <section class="cards">
        <div class="item">
          <a href="./Services.php?service=Home+services">
            <img src="./images/Homeservice.jpg" alt="Image 1">
            <div class="contentCard">
              <h2>Home Services</h2>
              <p>Cleaning home services refer to professional
                cleaning
                services provided to individuals or households to
                maintain cleanliness and hygiene within their homes.
                These services typically involve trained and experienced cleaners who visit homes on a scheduled or
                as-needed.</p>
            </div>
        </div>
        </a>

        <div class="item">
          <a href="./Services.php?service=Office+services">
            <img src="./images/officeService.jpg" alt="Image 2">
            <div class="contentCard">
              <h2>Office Services</h2>
              <p>Office services play a vital role in supporting the efficient functioning of office spaces. They
                encompass
                a
                range of administrative, facility management, IT support, and other services that contribute to the
                smooth
                operation of an office.</p>
            </div>
        </div>
        </a>

        <div class="item">
          <a href="./Services.php?service=Emergency+services">
            <img src="./images/EmergencyService.jpg" alt="Image 3">
            <div class="contentCard">
              <h2>Emergency Services</h2>
              <p>Emergency services are crucial in ensuring public safety, minimizing harm, and providing timely
                assistance
                during critical situations.These services require highly trained professionals, specialized equipment,
                and
                effective communication.</p>
            </div>
        </div>
        </a>
      </section>
    </div>
  </div>


  <div class="other-services">
    <div class="contentServiceAll">
      <hr>
      <div class="mid">
        <h2>Other Services</h2>
        <form>
          <input type="text" name="search" id="search" placeholder="Search Services...">
          <button type="submit">Search</button>
        </form>
      </div>
      <hr>
      <div class="allservices">
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


  <!-- copyright -->
  <footer>
    <div class="footer-bottom">
      <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      // Optional parameters
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoplay: {
        delay: 3000, // Autoplay delay in milliseconds (e.g., 3000ms = 3 seconds)
      }
    });
    function scrollDownClk() {
      // Scroll down by 300 pixels smoothly
      window.scrollTo({
        top: window.scrollY + 500,
        behavior: 'smooth'
      });
    }

  </script>


</body>

</html>