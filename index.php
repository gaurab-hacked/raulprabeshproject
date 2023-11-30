<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sahaj-Subidha</title>
  <link rel="stylesheet" href="style111.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./Service.css">
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
          <a href="./Services/homeservice.php">
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
          <a href="./Services/officeservice.php">
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
          <a href="./Services/emergencyservice.php">
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
        <h2>Ultimate Services</h2>
        <form>
          <input type="text" name="search" id="search" placeholder="Search Services...">
          <button type="submit">Search</button>
        </form>
      </div>
      <hr>
      <div class="allservices">
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
        <div class="card">
          <img src="./images/EmergencyService.jpg" alt="Product Image">
          <div class="card-content">
            <h2>Product Name</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.</p>
            <a href="#" class="order-btn">Order Now</a>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- copyright -->
  <footer>
    <div class="footer-bottom">
      <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
    </div>
  </footer>
  <!-- Swiper JS -->
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