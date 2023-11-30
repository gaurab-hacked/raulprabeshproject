<!DOCTYPE html>
<html>

<head>
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

    /* 

                .logo :hover {
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

    /* Styles for the About Us section */
    .about-us-section {
      background-color: #ffffff;
      padding: 15px;
      margin-left: 20px;
      text-align: justify;
      margin-top: 9%;

    }

    /* Styles for the heading in the About Us section */
    .about-us-section h2 {
      font-size: 40px;
      margin-bottom: 20px;
      background-color: transparent;
    }

    /* Styles for the paragraph text in the About Us section */
    .about-us-section p {
      font-size: 25px;
      color: #000000;
      margin-bottom: 30px;
    }

    /* Styles for the team members */
    .team {
      display: flex;
      justify-content: center;
    }

    .team-member {
      margin: 20px;
      text-align: center;
    }

    .team-member img {
      width: 200px;
      height: 200px;
      border-radius: 50%;
    }

    .team-member h4 {
      font-size: 18px;
      margin-top: 10px;
      margin-bottom: 5px;
    }

    .team-member p {
      font-size: 14px;
      color: #888;
    }

    /* .image1 {
              display:flex;
              flex-direction: column;
              justify-content: center;
              padding: 20px;
              width: 50%;
              height: 400px;
            
          } */

    footer {
      background-color: #ffffff;
      color: #000000;
      padding: 40px 0;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .footer-column {
      width: 33%;
      padding: 0 10px;
      margin-bottom: 50px;
    }

    .footer-column h3 {
      margin-top: 0;
    }

    .footer-column p,
    .footer-column ul {
      margin: 0;
      color: #000000;
    }

    .footer-column ul li {
      margin-bottom: 40px;

    }

    .footer-column ul li a {
      color: #bfbfbf;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .footer-column ul li a:hover {
      color: #000000;
    }

    .footer-bottom {
      text-align: center;
      background-color: #000000;
      color: #ffffff;
      padding: 20px 0;
    }
  </style>
</head>

<body>
  <?php include "./common/Navigation.php" ?>

  <div class="about-us-section">
    <center>
      <h2>About Us</h2>
    </center>

    <p>Welcome to SAHAJ SUBIDHA, your trusted service provider for all your office needs. We are dedicated
      to
      delivering exceptional solutions tailored to meet the unique requirements of your business.
      We take pride in our customer-centric approach, working closely with our clients to understand their
      specific
      needs and challenges. By offering customized solutions, we aim to build long-term partnerships that
      foster
      growth and success for your business.

      In today's fast-paced world, individuals are increasingly preoccupied with their personal
      obligations
      and
      responsibilities, leaving them with limited time to dedicate to household chores and other
      unofficial
      tasks.
      As a result, many people encounter difficulties in managing various aspects of their lives.
      Recognizing
      these challenges, we are dedicated to developing an innovative webservice called "Sahaj Subidha."

      Sahaj Subidha strives to address these issues by offering a comprehensive range of convenient home
      and
      office services to its customers. Our website aims to streamline the daily lives of individuals and
      businesses by providing a user-friendly platform where a plethora of services can be easily accessed
      and
      availed.

      By leveraging the power of technology, Sahaj Subidha aims to simplify the process of outsourcing
      essential
      tasks, allowing people to reclaim their valuable time and focus on their core priorities. Whether
      it's
      household chores, administrative duties, or specialized services, our platform serves as a one-stop
      solution, connecting users with reliable service providers who can efficiently meet their specific
      needs.
    </p>



    <div class="team">
      <div class="team-member">
        <img src="./Pictures/RA.jpg" Team Member 1">
        <h4>Rahul Tuladhar</h4>
        <p>Frontend Developer</p>
      </div>
      <div class="team-member">
        <img src="./Pictures/PR.jpg" alt="Team Member 2">
        <h4>Prabesh Pudasaini</h4>
        <p>Backend Developer</p>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-content">
      <div class="footer-column">
        <h3>About Us</h3>
        <br>
        <p>Welcome to SAHAJ SUBIDHA, your trusted service provider for all your office needs. We are dedicated
          to
          delivering exceptional solutions tailored to meet the unique requirements of your business.
          We take pride in our customer-centric approach, working closely with our clients to understand their
          specific
          needs and challenges. By offering customized solutions, we aim to build long-term partnerships that
          foster
          growth and success for your business.
        </p>
      </div>
      <div class="footer-column">
        <h3>Links</h3>
        <ul>
          <li><a href="./index.php">Home</a></li>
          <li><a href="./index.php">Contact</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Us</h3>
        <p>Email: info@SahajSubidha.com</p>
        <p>Phone: 123-456-7890</p><br>
        <a href="./index.php"><img src="./Logo/asd.png" alt="Logo: Sahaj-Subidha"></a>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
    </div>
  </footer>

  <!-- Other sections -->

</body>

</html>