<?php
include_once "../header.php";
?>
<style lang="">
  a {
    color: white;
  }
</style>

<div class="container" style="margin-top: 3rem;">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Users - EDIT RECORD</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 mx-auto">
      <?php

      include 'catagory_model.php';
      $model = new Model();
      $id = $_REQUEST['id'];
      $row = $model->edit($id);
      $rowse = $model->fetch_single($id);
      // var_dump($rowse['cust_image']);

      if (isset($_POST['update'])) {
        if (
          isset($_POST['first_name']) &&
          isset($_POST['last_name']) && isset($_POST['first_name']) 
          && isset($_POST['password']) && isset($_POST['email'])
          && isset($_POST['address'])
        ) {
         
          $data['id'] = $id;
          $data['first_name'] = $_POST['first_name'];
          $data['last_name'] = $_POST['last_name'];
          $data['email'] = $_POST['email'];
          $data['address'] = $_POST['address'];
          // echo "<pre>";
          if ($_FILES['cust_image']['name']) {
            $img_name = $_FILES['cust_image']['name'];
            $img_type = $_FILES['cust_image']['type'];
            $tmp_name = $_FILES['cust_image']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ["jpeg", "png", "jpg"];
            if (in_array($img_ext, $extensions) === true) {
              $types = ["image/jpeg", "image/jpg", "image/png"];
              if (in_array($img_type, $types) === true) {
                $time = time();
                $new_img_name = $time . $img_name;
                if (move_uploaded_file($tmp_name, "../../../Auth/customer/images/" . $new_img_name)) {

                  $data['cust_image'] = $new_img_name;
                } else {
                  echo "Something went wrong. Please try again!";
                }
              }
            } else {
              echo "Please upload an image file - jpeg, png, jpg";
            }
          } else {
            $data['cust_image'] = $rowse['cust_image'];
          }
          $data['password'] = $_POST['password'];

          $update = $model->update($data);

          if ($update) {
            echo "<script>alert('record update successfully');</script>";
            echo "<script>window.location.href = 'catagories.php';</script>";
          } else {
            echo "<script>alert('record update failed');</script>";
            echo "<script>window.location.href = 'records.php';</script>";
          }
        } else {
          echo "<script>alert('empty');</script>";
          header("Location: edit.php?id=$id");
        }
      }

      ?>
      <div><a href="catagories.php" style="color: blue;">Go Back</a></div>

      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="">First Name</label>
          <input placeholder="Enter First Name" value="<?php echo $row['first_name']; ?>" type="text" name="first_name">
        </div>
        <div class="form-group">
          <label for="">Last Name</label>
          <input placeholder="Enter Last Name" value="<?php echo $row['last_name']; ?>" type="text" name="last_name">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input placeholder="Email" value="<?php echo $row['email']; ?>" type="text" name="email">
        </div>

        <div class="form-group">
          <label for="">Address</label>
          <input placeholder="Enter Address" value="<?php echo $row['address']; ?>" type="text" name="address">
        </div>
        <div class="form-group">
          <label for="">Profile Picture</label>
          <input placeholder="Enter Address" value="<?php echo $rowse['cust_image']; ?>" type="file" name="cust_image">
        </div>


        <div class="form-group">
          <label for="">Password</label>
          <input name="password" placeholder="Enter Password" value="<?php echo $row['password']; ?>" type="password">
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