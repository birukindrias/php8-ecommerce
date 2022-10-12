<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>PHP OOP CRUD TUTORIAL</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">PHP OOP CRUD TUTORIAL - EDIT RECORD</h1>
        <hr style="height: 1px;color: black;background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 mx-auto">
        <?php

        include 'product_model.php';
        $model = new Model();
        $id = $_REQUEST['id'];
        $row = $model->edit($id);

        if (isset($_POST['update'])) {
          if (
            isset($_POST['Pro_title']) && isset($_POST['Pro_price']) && isset($_POST['Pro_desc'])
            && isset(
              $_FILES['Pro_image']['name']
            )
          ) {
            if (!empty($_POST['Pro_title']) && !empty($_POST['Pro_price']) && !empty($_POST['Pro_desc']) && !empty($_FILES['Pro_image']['name'])) {

              $data['id'] = $id;
              $data['Pro_title'] = $_POST['Pro_title'];
              $data['Pro_desc'] = $_POST['Pro_desc'];
              $data['Pro_price'] = $_POST['Pro_price'];
              $data['Pro_image'] =
                $_FILES['Pro_image']['name'];


              $update = $model->update($data);

              if ($update)  {
                echo "<script>alert('record update successfully');</script>";
                echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
              } else {
                echo "<script>alert('record update failed');</script>";
                echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
              }
            } else {
              echo "<script>alert('empty');</script>";
              header("Location: edit.php?id=$id");
            }
          }
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="Pro_title" value="<?php echo $row['Pro_title']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="Pro_desc" value="<?php echo $row['Pro_desc']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Mobile No.</label>
            <input type="file" name="Pro_image" value="<?php echo $row['Pro_image']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <textarea name="Pro_price" id="" cols="" rows="3" class="form-control"><?php echo $row['Pro_price']; ?></textarea>
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