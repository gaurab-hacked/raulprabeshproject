<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sajha Subidha</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/products.css" />
</head>

<body>
  <div id="Navigations">
    <div id="topNav">
      <nav>
        <div id="Logo">Sajha Subidha</div>
        <div id="Greeting">Hello Admin, Good Morning!!!</div>
        <div id="searchItem">
          <form action="#">
            <input type="text" name="search" id="search" placeholder="Search..." />
            <button type="submit">search</button>
          </form>
        </div>
        <div id="profile"></div>
      </nav>
    </div>
    <div id="sideNav">
      <ul>
        <li><a href="./">Dashboard</a></li>
        <li><a href="./category.php">Category</a></li>
        <li><a href="./subcategory.php">Subcategory</a></li>
        <li><a href="./products.php" class="active">Products</a></li>
        <li><a href="./orders.php">Orders</a></li>
        <li><a href="./delivery.php">Delivery</a></li>
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
          <button onclick="ModalOpen()">Add product</button>
          <div id="NavigationContent">
            <a href="./">Dashboard</a> /
            <a href="./products.php">product</a>
          </div>
        </div>
        <table>
          <thead>
            <tr>
              <th>S.N</th>
              <th>Title</th>
              <th>Description</th>
              <th>Image</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>This is Title</td>
              <td>This is description i like.</td>
              <td><img style="height: 35px; width: 35px; border-radius: 5px; object-fit: cover;"
                  src="https://m.media-amazon.com/images/M/MV5BYWYyZmNiOTEtODY0Zi00ZDNiLTlhZmMtMzE2Mzk5NGMwYzhlXkEyXkFqcGdeQXVyOTkwNTM4MTk@._V1_.jpg"
                  alt=""></td>
              <td>Gaurab</td>
              <td>Sunar</td>
              <td><a href="#">
                  <?php include "./svg/edit.svg" ?>
                </a></td>
              <td><a href="#">
                  <?php include "./svg/delete.svg" ?>
                </a></td>
            </tr>
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
            <p>Add Product</p>
            <div onclick="closeModal()">X</div>
          </div>
          <hr />
          <div id="modalBody">
            <form action="#">
              <div class="flex">
                <select name="category" id="categoryDropDOwn">
                  <option value="null">Select Category</option>
                  <option value="1">Gaurab</option>
                  <option value="1">Rahul</option>
                  <option value="1">Prabesh</option>
                </select>
                <select name="Subcategory" id="subcategoryDropDOwn">
                  <option value="null">Select Subcategory</option>
                  <option value="1">Sunar</option>
                  <option value="1">Tuladhar</option>
                  <option value="1">Pudasaini</option>
                </select>
              </div>
              <div class="flex">
                <input type="text" name="productName" id="product" placeholder="Product Name" />
                <input type="file" name="productImage" id="product" placeholder="product Image" />
              </div>
              <textarea name="productDescription" id="description" cols="30" rows="8"></textarea>
              <div id="FormButtons">
                <button type="reset" id="resetContent">Reset</button>
                <button type="submit" id="postContent">Post</button>
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
      if (
        modalHiddenBlock.style.display === "" ||
        modalHiddenBlock.style.display === "none"
      ) {
        modalHiddenBlock.style.display = "block";
      } else {
        modalHiddenBlock.style.display = "none";
      }
    };
    const closeModal = () => {
      modalHiddenBlock.style.display = "none";
    };
  </script>
</body>

</html>