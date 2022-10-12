<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Catagory</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">Catagory - EDIT RECORD</h1>
        <hr style="height: 1px;color: black;background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 mx-auto">
        <?php

        include 'catagory_model.php';
        $model = new catagory_model();
        $id = $_REQUEST['id'];
        $row = $model->edit($id);
        if (isset($_POST['update'])) {
          if (
            isset($_POST['cat_title']) && isset($_POST['cat_desc'])
          ) {
            if (!empty($_POST['cat_title']) && !empty($_POST['cat_desc'])) {

              $data['cat_id'] = $id;
              $data['cat_title'] = $_POST['cat_title'];
              $data['cat_desc'] = $_POST['cat_desc'];

              $update = $model->update($data);

              if ($update) {
                echo "<script>alert('record update successfully');</script>";
                echo "<script>window.location.href = 'catagories.php';</script>";
              } else {
                echo "<script>alert('record update failed');</script>";
                // echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
              }
            } else {
              echo "<script>alert('empty');</script>";
              header("Location: edit.php?id=$id");
            }
          }
        }

        ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="">cat_title</label>
            <input type="text" name="cat_title" value="<?php echo $row['cat_title']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">cat_desc</label>
            <input type="text" name="cat_desc" value="<?php echo $row['cat_desc']; ?>" class="form-control">
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