<?php
include_once "../header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Product - EDIT RECORD</h1>
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
      $row = $model->edit($id);
echo "<pre>";
      // var_dump($_POST['brand_brand_id']);
      $cats = $model->fetch_cat();
      $brand = $model->fetch_brand();
      if (isset($_POST['update'])) {
        if (
          isset($_POST['Pro_title']) && isset($_POST['Pro_price']) && isset($_POST['Pro_desc'])
        ) {
          if (!empty($_POST['Pro_title']) && !empty($_POST['Pro_price']) && !empty($_POST['Pro_desc']) ) {

            $data['id'] = $id;
            $data['Pro_title'] = $_POST['Pro_title'];
            $data['Pro_desc'] = $_POST['Pro_desc'];
            $data['Pro_price'] = $_POST['Pro_price'];

            $data['brand_brand_id']=  $_POST['brand_brand_id'];
            $data['admin_id']=  $_SESSION['admin_id'];

            $data['catagory_Cat_id']=  $_POST['catagory_Cat_id'];
            $data['Pro_image']
            = $row['Pro_image'];
            if (isset($_FILES['Pro_image']['name'])) {
              $img_name = $_FILES['Pro_image']['name'];
              $img_type = $_FILES['Pro_image']['type'];
              $tmp_name = $_FILES['Pro_image']['tmp_name'];

              $img_explode = explode('.', $img_name);
              $img_ext = end($img_explode);
              // var_dump($img_ext);
              $extensions = ["jpeg", "png", "jpg"];
              if (in_array($img_ext, $extensions) === true) {
                // $types = ["jpeg", "jpg", "png"];
                // if (in_array($img_type, $types) === true) {
                $time = time();
                $new_img_name = $time . $img_name;
                if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                  $data['Pro_image'] = $new_img_name;
                 
                } else {
                  echo "Something went wrong. Please try again!";
                }
              }
              // } else {
              // 	echo "Please upload an image file - jpeg, png, jpg";
              // }
            }

            $update = $model->update($data);
            if ($update) {
              echo "<script>alert('record update successfully');</script>";
              echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
            } else {
              echo "<script>alert('record update failed');</script>";
              echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
            }
          } else {
            echo "<script>alert('empssty');</script>";
            header("Location: edit_product.php?id=$id");
          }
        }
      }

      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Product Title</label>
          <input type="text" name="Pro_title" value="<?php echo $row['Pro_title']; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product Description</label>
          <input type="text" name="Pro_desc" value="<?php echo $row['Pro_desc']; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product Image</label>
          <input type="file" name="Pro_image" value="<?php echo $row['Pro_image']; ?>" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Product Price</label>
          <input name="Pro_price" id="" class="form-control" value="<?php echo $row['Pro_price']; ?>">
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
                <?php echo $key['brand_title'];
                ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" name="update" class="btn btn-primary">Submit</button>
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