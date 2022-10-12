<?php
include_once "../header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Product - INSERT RECORD</h1>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <hr style="height: 1px;color: black;background-color: black;">
    </div>
    <div><a href="products.php">Go Back</a></div>

  </div>
  <div class="row">
    <div class="col-md-5 mx-auto">
      <?php

      include 'product_model.php';
      $model = new Model();
      $insert = $model->insert();
      $cats = $model->fetch_cat();
      $brand = $model->fetch_brand();

      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Product title</label>
          <input type="text" name="Pro_title" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product description</label>
          <input type="text" name="Pro_desc" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product price</label>
          <input type="integer" name="Pro_price" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product image</label>
          <input name="Pro_image" id="" type="file" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Catagories</label>

          <select name="catagory_Cat_id" id="">
            <?php
            foreach ($cats as $key) {
            ?>
              <option value="<?= $key['cat_id'] ?>">
                <?= $key['cat_title'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">brands</label>

          <select name="brand_brand_id" id="">
            <?php
            foreach ($brand as $key) {
            ?>
              <option value="<?= $key['brand_id'] ?>">
                <?= $key['brand_title'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
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