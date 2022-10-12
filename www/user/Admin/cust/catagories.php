<?php
include_once "../header.php";
?>
<style lang="">
  td img{
    border-radius: 50% !important;
  }
  td img{
    width:8rem !important;
    height:8rem !important;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Users</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>
    <div><a href="create_catagory.php">create User</a></div>

  </div>
  <div><a href="../index.php">Go Back</a></div>

  <div class="row">
    <div class="col-md-12">

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>address</th>
            <th>customer image</th>
            <th>password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include 'catagory_model.php';
          $model = new Model();
          $rows = $model->fetch();
          $i = 1;
          if (!empty($rows)) {
            foreach ($rows as $row) {
          ?>
              <tr>
                <td><?php echo $row['cust_id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><img src="../../../Auth/customer/images/<?php echo $row['cust_image']; ?>" width="185rem" height="125rem"></td>
                <td width="20px">XXXXXXXX<?php
                                          //  echo $row['password']; 
                                          ?></td>
                <td>
                  <a href="catagory.php?id=<?php echo $row['cust_id']; ?>" class="badge badge-info">Read</a>
                  <a href="delete_catagory.php?id=<?php echo $row['cust_id']; ?>" class="badge badge-danger">Delete</a>
                  <a href="edit_catagory.php?id=<?php echo $row['cust_id']; ?>" class="badge badge-success">Edit</a>
                </td>
              </tr>

          <?php
            }
          } else {
            echo "no users until";
          }

          ?>
        </tbody>
      </table>
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