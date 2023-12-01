<!DOCTYPE html>
<html>

<head>
  <title>Job Descriptions</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #F2F2F2;
    }

    /* For nav bar */
    @media screen and (max-width: 768px) {
      .logo {
        flex-direction: column;
        align-items: center;
      }

      .logo img {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .logo h1 {
        font-size: 24px;
      }

      .nav-menu ul {
        flex-direction: column;
        margin-top: 10px;
      }

      .nav-menu li {
        margin-left: 0;
        margin-bottom: 10px;
      }
    }


    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      background-color: rgb(255, 255, 255);
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 99;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;

    }

    .logo {
      display: flex;
      align-items: center;

      transform: scale(1);
      transform-origin: right;
      box-shadow: transparent
    }


    /* .logo :hover {
                  box-shadow: 11px 9px #000000;
                  transform-origin: left;
                  transform: scale(1.1);
                  transition: 0.8S;

                } */

    .logo img {
      height: 60px;
      margin-right: 10px;
    }


    .logo h1 {
      font-size: 36px;
      font-weight: 600;
      color: #333;
      user-select: none;
    }

    .nav-menu ul {
      display: flex;
      list-style: none;
    }

    .nav-menu li {
      margin-left: 20px;

    }

    .nav-menu a {
      position: relative;
      font-size: 1.4em;
      font-weight: 400;
      color: #333;
      text-decoration: none;
      margin-left: 10px;
      /* transition: all 0.2s ease; */
    }

    .nav-menu a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 100%;
      height: 3px;
      background: #000000;
      border-radius: 4px;
      transform-origin: left;
      transform: scaleX(0);
      transition: .5s;
    }

    .nav-menu a:hover::after {
      transform-origin: right;
      transform: scaleX(1);
    }

    li a {
      display: block;
      color: #000000;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    li.dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      border-radius: 15px;
      border-inline-color: #000000;
      background-color: white;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(5, 5, 5, 0.477);
      z-index: 1;
    }

    .dropdown-content a {
      color: #000000a7;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    main {
      margin-top: 8%;
    }

    h1 {
      font-size: 40px;
      margin-bottom: 20px;
      background-color: rgba(223, 218, 218, 0.715);
    }

    /* CSS styles for the job listings */
    .job-listing {
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .job-title {
      font-weight: bold;
      font-size: 18px;
    }

    .job-company {
      color: #888;
      margin-top: 5px;
    }

    .job-description {
      margin-top: 10px;
    }

    .job-requirements {
      margin-top: 10px;
    }

    .job-link {
      display: inline-block;
      margin-top: 10px;
      padding: 5px 10px;
      background-color: #333;
      color: #fff;
      text-decoration: none;
      border-radius: 3px;
    }

    .job-link:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <main>
    <header class="header">
      <div class="logo">
        <a href="../index.php"><img src="../Logo/asd.png" alt="Logo: Sahaj-Subidha"></a>
      </div>
      <!-- menu -->
      <nav class="nav-menu">
        <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../about.php">About</a></li>
          <li class="dropdown">
            <a href="#" class="dropbtn">Service</a>
            <div class="dropdown-content">
              <a href="./homeservice.php">Home Service</a>
              <a href="./officeservice.php">Office Service</a>
            </div>
          </li>
          <li><a href="../index.php">Contact</a></li>
        </ul>
      </nav>

    </header>
    <!-- End Navbar -->

    <center>
      <h1>Emergency Services</h1>
    </center>

    <div class="job-listing">
      <h2 class="job-title">Painter</h2>
      <p class="job-company">Company A</p>
      <div class="job-description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu mauris ac urna ultricies commodo. Proin
          rhoncus cursus felis, id congue tellus fermentum vel.</p>
      </div>
      <div class="job-requirements">
        <h4>Requirements:</h4>
        <ul>
          <li>Minimum 2 years of experience</li>
          <li>Excellent communication skills</li>
          <li>Ability to work in a team</li>
        </ul>
      </div>
      <a href="#" class="job-link">Apply Now</a>
    </div>

    <div class="job-listing">
      <h2 class="job-title">Cook</h2>
      <p class="job-company">Company B</p>
      <div class="job-description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu mauris ac urna ultricies commodo. Proin
          rhoncus cursus felis, id congue tellus fermentum vel.</p>
      </div>
      <div class="job-requirements">
        <h4>Requirements:</h4>
        <ul>
          <li>Minimum 3 years of experience</li>
          <li>Strong problem-solving skills</li>
          <li>Knowledge of HTML/CSS</li>
        </ul>
      </div>
      <a href="#" class="job-link">Apply Now</a>
    </div>

    <div class="job-listing">
      <h2 class="job-title">Cleaner</h2>
      <p class="job-company">Company B</p>
      <div class="job-description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu mauris ac urna ultricies commodo. Proin
          rhoncus cursus felis, id congue tellus fermentum vel.</p>
      </div>
      <div class="job-requirements">
        <h4>Requirements:</h4>
        <ul>
          <li>Minimum 3 years of experience</li>
          <li>Strong problem-solving skills</li>
          <li>Knowledge of HTML/CSS</li>
        </ul>
      </div>
      <a href="#" class="job-link">Apply Now</a>
    </div>

    <div class="job-listing">
      <h2 class="job-title">Plumber</h2>
      <p class="job-company">Company B</p>
      <div class="job-description">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu mauris ac urna ultricies commodo. Proin
          rhoncus cursus felis, id congue tellus fermentum vel.</p>
      </div>
      <div class="job-requirements">
        <h4>Requirements:</h4>
        <ul>
          <li>Minimum 3 years of experience</li>
          <li>Strong problem-solving skills</li>
          <li>Knowledge of HTML/CSS</li>
        </ul>
      </div>
      <a href="#" class="job-link">Apply Now</a>
    </div>
  </main>
</body>

</html>