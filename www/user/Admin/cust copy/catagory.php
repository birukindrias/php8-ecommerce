<?php
include_once "../header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Users</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>
    <div><a href="catagories.php">Go Back</a></div>

  </div>
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
            <th>cust_image</th>
            <th>password</th>
          </tr>
        </thead>
        <tbody>
          <?php

          include 'catagory_model.php';
          $id = $_REQUEST['id'];
          $model = new Model();
          $rows = $model->fetch_single($id);
          $i = 1;
          if (!empty($rows)) {
            // var_dump($rows);
            // foreach ($rows as $row) {
          ?>
            <tr>

              <td><?php echo $rows['cust_id']; ?></td>
              <td><?php
                  echo $rows['first_name']; ?></td>
              <td><?php echo $rows['last_name']; ?></td>
              <td><?php echo $rows['email']; ?></td>
              <td><?php echo $rows['address']; ?></td>
              <td>
                <img src="../../../Auth/customer/images/<?php echo $rows['cust_image']; ?>" width="185rem" height="125rem">
              </td>
              <td><?php echo "XXXXXX"
              // $rows['password']; ?></td>

            </tr>

          <?php

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