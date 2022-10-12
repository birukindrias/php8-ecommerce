<?php
include_once "./../header.php";
?>
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
<div class="product">

  <?php

  include 'catagory_model.php';
  $model = new catagory_model();
  $rows = $model->fetch();
  $cart = $model->cart_add();
  if (!session_id()) {
    session_start();
  }

  $id = $_SESSION['cust_id'];
  // var_dump($id);
  if ($id) {
    if (!empty($rows)) {
      foreach ($rows as $row) {
  ?>
        <div class="item">
          <center>
            <div class="img">
              <img src="/user/Admin/Product/images/<?php echo $row['Pro_image']; ?>" alt="">
            </div>
            <div class="buttons">
              <button><a href="../products/product.php?id=$row['Pro_id'] ?>"> view Product</a></button>

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
      echo "There is no product in this catagory";
    }
    ?>

</div>
<?php
  } else {

    echo "<script> alert('Please Register first')</script>";
    header('location: /Auth/customer/login.php');
  }
?>
</body>

</html>