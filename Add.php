<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prabeshraul";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// !======================= SESSION =======================
$userId = 0;
$userName = "User";
$userEmail = "user@gmail.com";
$userPrivilege = 0;
$userPhoneNumber = 0000000000;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if specific session variables exist
if (isset($_SESSION['id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phNumber'], $_SESSION['privilege'])) {
    $userId = $_SESSION['id'];
    $userName = $_SESSION['name'];
    $userEmail = $_SESSION['email'];
    $userPrivilege = $_SESSION['privilege'];
    $userPhoneNumber = $_SESSION['phNumber'];
} else {
    header("Location: ./index.php");
}




// !======================= Initial variable setup =======================
$categoryId = "";
$subcategoryId = "";
$productId = "";
$title = "";
$description = "";
$phnumber = "";
$address = "";


// !======================= UPDATE Operation =======================
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $sqlEditOne = "SELECT * FROM producttable WHERE id = $editId";
    $resultEditOne = $conn->query($sqlEditOne);
    if ($resultEditOne->num_rows > 0) {
        $row = $resultEditOne->fetch_assoc();
        $categoryId = $row["categoryid"];
        $subcategoryId = $row["subcategoryid"];
        $productId = $row["id"];
        $title = $row["name"];
        $description = $row["description"];
        $phnumber = $row["phnumber"];
        $address = $row["address"];
    }
}
if (isset($_POST['updateProduct'])) {
    $categoryId = $_POST["category"];
    $subcategoryId = $_POST["subcategory"];
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    // $userId = 1;
    $idToUpdate = $_POST['updateid'];

    // File upload handling
    if (!empty($_FILES["image"]["name"])) {
        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Image uploaded successfully, update both product and subcategory
                $imagePath = $targetFile;
                $sqlUpdateProduct = "UPDATE producttable SET categoryId='$categoryId', subcategoryId='$subcategoryId', name='$productName', description='$productDescription', image='$imagePath', userId='$userId' WHERE id=$idToUpdate";

                if ($conn->query($sqlUpdateProduct) === TRUE) {
                    // echo "Record updated successfully";
                    header("Location: ./add.php");
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        // No new image provided, update only product data
        $sqlUpdateProduct = "UPDATE producttable SET categoryId='$categoryId', subcategoryId='$subcategoryId', name='$productName', description='$productDescription', userId='$userId' WHERE id=$idToUpdate";

        if ($conn->query($sqlUpdateProduct) === TRUE) {
            // echo "Record updated successfully";
            header("Location: ./add.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

// !======================= DELETE Operation =======================
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $sql = "DELETE FROM producttable WHERE id=$idToDelete";

    if ($conn->query($sql) === TRUE) {
        header("Location: ./add.php");
        // echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


// !======================= READ Operation =======================
// ?======== for category ============
$sqlCategory = "SELECT id, category, date FROM category";
$resultCategory = $conn->query($sqlCategory);

// ?======== for subcategory ============
$sqlsubcategory = "
SELECT
c.category AS category,
c.id AS categoryId,
s.subcategory AS subcategory,
s.date AS date,
s.id AS id
FROM
subcategory AS s
JOIN
category AS c ON s.categoryId = c.id
        ";
$resultsubcategory = $conn->query($sqlsubcategory);


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
    subcategory AS s ON s.id = p.subcategoryId WHERE p.userid = '$userId'
    ";

// Perform the query
$resultProduct = $conn->query($sqlProduct);

// !======================= CREATE Operation =======================
// Create Product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createProduct"])) {
    $categoryId = $_POST["category"];
    $subcategoryId = $_POST["subcategory"];
    $productName = $_POST["productName"];
    $productDescription = $_POST["productDescription"];
    $phnumber = $_POST["phnumber"];
    $address = $_POST["address"];
    // $userId = 1; // Replace with the actual user ID or implement user authentication

    // File upload handling
    if (isset($_FILES["image"])) {
        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;
                $sqlCreateProduct = "INSERT INTO producttable (categoryId, subcategoryId, name, description, image, userId, phnumber, address) VALUES ('$categoryId', '$subcategoryId', '$productName', '$productDescription', '$imagePath', '$userId', '$phnumber', '$address')";

                if ($conn->query($sqlCreateProduct) === TRUE) {
                    // echo "Product created successfully";
                    header("Location: ./add.php");
                } else {
                    echo "Error creating product: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please select an image file.";
    }
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
    <link rel="stylesheet" href="./css/singleProduct.css">
    <link rel="stylesheet" href="./css/product.css">
    <style>
        #single-page-container h2 {
            color: rgba(0, 0, 0, 0.7);
            margin-left: 14px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        #single-page-container {
            display: flex;
            flex-direction: column;
            width: 95%;
            margin: 50px auto;
        }

        #single-page-container svg {
            height: 18px !important;
            width: 19px !important;
        }

        #content-container {
            margin-top: -20px;
        }

        .NoResult {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php include "./common/Navigation.php" ?>
    <div id="single-page-container">
        <div id="content-container">
            <h2>ADD PRODUCT</h2>
            <div id="modalBody">
                <form action="./add.php" method="post" enctype="multipart/form-data">
                    <div class="flex">
                        <select name="category" id="categoryDropDOwn" onchange="filterSubcategories(this.value)">
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

                        <select name="subcategory" id="subcategoryDropDOwn">
                            <option value="null">Select Subcategory</option>
                            <?php
                            if ($resultsubcategory->num_rows > 0) {
                                while ($row = $resultsubcategory->fetch_assoc()) {
                                    $selected = ($row['id'] == $subcategoryId) ? 'selected' : '';
                                    echo '<option class="subcategory-option" data-category-id="' . $row['categoryId'] . '" value="' . $row['id'] . '" ' . $selected . '>' . $row['subcategory'] . '</option>';
                                }
                            }

                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="updateid" id="" value="<?php echo htmlspecialchars($productId); ?>">
                    <div class="flex">
                        <input type="text" name="productName" id="product" placeholder="Product Title"
                            value="<?php echo htmlspecialchars($title); ?>" />
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png"
                            placeholder="Product Image" />
                    </div>
                    <div class="flex">
                        <input type="number" name="phnumber" id="productphnumber" placeholder="Product phone number"
                            value="<?php echo htmlspecialchars($phnumber); ?>" />
                        <input type="text" name="address" id="address" placeholder="Product address"
                            value="<?php echo htmlspecialchars($address); ?>" />
                    </div>
                    <textarea name="productDescription" id="description" cols="30" rows="8"
                        placeholder="Write description here..."><?php echo htmlspecialchars($description); ?></textarea>

                    <div id="FormButtons">
                        <button type="reset" id="resetContent">Reset</button>
                        <?php echo !isset($_GET['edit']) ? '
                <button type="submit" id="postContent" name="createProduct">Post</button>
                ' : '
                <button type="submit" id="postContent" name="updateProduct">Update</button>
                ' ?>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <h2>YOUR POSTS</h2>
        <?php
        if ($resultProduct->num_rows > 0) {
            echo '<table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Subcategory</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>';

            $serialNumber = 1;
            while ($row = $resultProduct->fetch_assoc()) {
                $productName = $row['productName'];
                $limitedProductName = strlen($productName) > 15 ? substr($productName, 0, 15) . '...' : $productName;

                $productDescription = $row['productDescription'];
                $limitedDescription = strlen($productDescription) > 25 ? substr($productDescription, 0, 25) . '...' : $productDescription;

                echo '
            <tr>
                <td>' . $serialNumber++ . '</td>
                <td>' . $limitedProductName . '</td>
                <td>' . $limitedDescription . '</td>
                <td><img style="height: 35px; width: 35px; border-radius: 5px; object-fit: cover;"
                         src="http://localhost/SahajSubidha/dashboard/' . $row['image'] . '"
                         alt="' . $row['productName'] . '"></td>
                <td>' . $row['category'] . '</td>
                <td>' . ($row['subcategory'] !== null ? $row['subcategory'] : '-') . '</td>
                <td>' . ($row['phnumber'] !== null ? $row['phnumber'] : '-') . '</td>
                <td>' . ($row['address'] !== null ? $row['address'] : '-') . '</td>
                <td><a href="?edit=' . $row['id'] . '" onclick="ModalOpen()">' . file_get_contents("./dashboard/svg/edit.svg") . '</a></td>
                <td><a href="?delete=' . $row['id'] . '">' . file_get_contents("./dashboard/svg/delete.svg") . '</a></td>
            </tr>';
            }

            echo '</tbody></table>';
        } else {
            echo "<h2 class='NoResult'>No Results Found</h2>";
        }
        ?>

    </div>
    <footer>
        <div class="footer-bottom">
            <p>&copy; 2023 SAHAJ SUBIDHA. All rights reserved.</p>
        </div>
    </footer>
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
        function filterSubcategories(id) {
            var subcategoryOptionsArray = [...document.querySelectorAll('.subcategory-option')];
            subcategoryOptionsArray.forEach(e => {
                if (Number(e.getAttribute('data-category-id')) === Number(id)) {
                    e.style.display = "block";
                } else {
                    e.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>