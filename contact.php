<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$userId = 0;
// Check if specific session variables exist
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
}


// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $insertContactQuery = "INSERT INTO contact (name, email, title, description, userId) VALUES ('$name', '$email', '$title', '$description', '$userId')";

    if ($conn->query($insertContactQuery) === TRUE) {
        // echo "Data inserted successfully!";
        header("Location: ./contact.php");
    } else {
        echo "Error: " . $insertContactQuery . "<br>" . $conn->error;
    }
} else {
    echo 'Invalid request method.';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/contacts.css">
    <link rel="stylesheet" href="./css/style111.css">

</head>

<body>
    <?php include "./common/Navigation.php" ?>
    <div class="contactContainer">
        <form method="post" action="./contact.php">
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