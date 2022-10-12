<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ecom</title>
  <link rel="stylesheet" href="../css/app.css">
</head>
<style lang="">
  .product {
    margin-top: 8rem !important;
  }

  .item {
    background-color: blueviolet !important;
    border-radius: .5rem;
    width: 25rem !important;
    color: white;
  }


  img {
    width: 23rem !important;

    border-radius: .5rem;

  }
</style>

<body>
  <nav>
    <div class="nav">
      <div class="left-link">
        <a href="/">Home</a>
        <!-- <a href="./user/Admin/Products/creatProduct.php">Product</a> -->
        <a href="../products/Products.php">Products</a>

        <a href="../types.php?type=brand">Brand</a>
        <a href="../types.php?type=Catagory">Catagory</a>
        <a href="">About Us</a>
        <div class="search">
          <form action="/user/customer/products/search_Products.php" method="get">
            <input type="text" placeholder="Search Product" name="search" id="">
            <button type="submit">search</button>
          </form>
        </div>
      </div>
      <div class="right-link">
        <!-- <a href="./user/customer/signup.php">SignUp </a> -->
        <?php
        if (!session_id()) {
          # code...
          session_start();
        }
        if (!$_SESSION['cust_id']) {
          // var_dump($_SESSION);
          echo '
                    <a href="Auth/choose_signup.php">SignUp </a> 
                <a href="Auth/customer/login.php">login </a> ';
        } ?>

        <a href="/user/customer/profile.php">Profile</a>

        <a href="/user/customer/carts/cart.php">Cart</a>

        <a href="/user/customer/logout.php">Logout</a>
        <!-- <a href="./user/customer/login.php">Login</a> -->
        <!-- <a href="./user/Admin/Products/carts_list.php">Cart</a>
                <a href="./user/Admin/Products/cart.php">Carta</a> -->
      </div>
    </div>
  </nav>

  <div class="product">

    <?php

    include 'catagory_model.php';
    $model = new catagory_model();
    $rows = $model->_brand();
    $cart = $model->cart_add();

    if (!session_id()) {
      # code...
      session_start();
    }
    $id = $_SESSION['cust_id'];
    // var_dump($id);
    // if ($id) {
    if (!empty($rows)) {
      foreach ($rows as $row) {
    ?>
        <div class="item">
          <center>
            <div class="img">
              <img src="/user/Admin/Product/images/<?php echo $row['Pro_image']; ?>" alt="">
            </div>
            <div class="buttons">
              <button><a href="../products/product.php?id=<?= $row['Pro_id'] ?>"> view Product</a></button>

              <form action="" method="POST">
                <input placeholder="Enter First Name" hidden value="<?php echo $row['Pro_id']; ?>" type="integer" name="product_pro_id">
                <input placeholder="Enter First Name" hidden value="1" type="integer" name="qnty">
                <input placeholder="Enter First Name" hidden value="<?= $id ?>" type="integer" name="customer_cust_id">
                <button type="submit" name="cart">Add to Cart</button>
              </form>
            </div>
          </center>
        </div>
    <?php
      }
    } else {
      echo "There is no product in this brand";
    }
    ?>

  </div>
  <?php
  // } else {

  //   echo "<script> alert('Please Register first')</script>";
  //   header('location: /Auth/customer/login.php');
  // }
  ?>
</body>

</html>