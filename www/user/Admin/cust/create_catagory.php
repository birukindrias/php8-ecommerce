<?php
include_once "../header.php";
?>

<?php

include 'catagory_model.php';
$model = new Model();
$insert = $model->insert();

?>
<div class="signup_">
  <div class="signup">
    <p>customer signup Form</p>
  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="">First Name</label>
      <input placeholder="Enter First Name" type="text" name="first_name">
    </div>
    <div class="form-group">
      <label for="">Last Name</label>
      <input placeholder="Enter Last Name" type="text" name="last_name">
    </div>
    <div class="form-group">
      <label for="">Email</label>
      <input placeholder="Email" type="text" name="email">
    </div>

    <div class="form-group">
      <label for="">Address</label>
      <input placeholder="Enter Address" type="text" name="address">
    </div>
    <div class="form-group">
      <label for="">custumer Image</label>
      <input placeholder="Enter Address" type="file" name="cust_image">
    </div>


    <div class="form-group">
      <label for="">Password</label>
      <input name="password" placeholder="Enter Password" type="password">
    </div>

    <div class="form-group">
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>