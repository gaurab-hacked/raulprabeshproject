<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./contacts.css">
    <link rel="stylesheet" href="style111.css">

</head>

<body>
    <?php include "./common/Navigation.php" ?>
    <div class="contactContainer">
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required placeholder="Enter Your Name">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter Your Email">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required placeholder="Enter Title">

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required placeholder="Enter Description"></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>