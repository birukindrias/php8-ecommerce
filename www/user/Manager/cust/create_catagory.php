<?php
include_once "../header.php";
?>
<?php

include 'catagory_model.php';
$model = new Model();
$insert = $model->insert();

?>
<div class="signup_" style="margin-top: 8rem;">
  <div class="signup">
    <h3>Create Admin</h3>
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
      <input placeholder="Email" type="email" name="email">
    </div>

    <div class="form-group">
      <label for="">Address</label>
      <input placeholder="Enter Address" type="text" name="address">
    </div>
    <!-- <div class="form-group">
        <label for="">Profile Picture</label>
        <input placeholder="Enter Address" type="file" name="cust_image">
      </div> -->


    <div class="form-group">
      <label for="">Password</label>
      <input name="password" placeholder="Enter Password" type="password">
    </div>

    <div class="form-group">
      <button type="submit" name="submit">Create Admin</button>
    </div>
  </form>
</div>

</body>

</html>