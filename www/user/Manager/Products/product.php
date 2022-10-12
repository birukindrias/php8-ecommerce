<style lang="">
  a {
    color: white;
  }
</style>
<?php
include_once "../header.php";
?>


<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Product - SINGLE RECORD</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>
  </div>
  <div><a href="products.php">Go Back</a></div>


  <div class="row">
    <div class="col-md-5 mx-auto">
      <?php

      include 'product_model.php';
      $model = new Model();
      $id = $_REQUEST['id'];
      $row = $model->fetch_single($id);
      if (!empty($row)) {

      ?>
        <div class="card">
          <div class="card-header">
            Single Record
          </div>
          <div class="card-body">
            <p>Product Title = <?php echo $row['Pro_title']; ?></p>
            <p>Product Description= <?php echo $row['Pro_desc']; ?></p>
            <p>Product Price = <?php echo $row['Pro_price']; ?></p>
            <p>Product Image = <img src="/user/Admin//Product/images/<?php echo $row['Pro_image']; ?>" width="185rem" height="120rem"></p>
          </div>
        </div>
      <?php
      } else {
        echo "no data";
      }
      ?>
    </div>
  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>