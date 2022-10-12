<?php
include_once "../header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">Admin Info</h1>
      <hr style="height: 1px;color: black;background-color: black;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div><a href="catagories.php">Go Back</a></div>

      <?php

      include 'catagory_model.php';
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
            <p>First Name = <?php echo $row['first_name']; ?></p>
            <p>Last Name = <?php echo $row['last_name']; ?></p>
            <p>Email = <?php echo $row['email']; ?></p>
            <p>password = XXXXX<?php 
            // echo $row['password']; ?></p>
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