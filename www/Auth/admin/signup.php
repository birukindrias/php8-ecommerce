<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/app.css">
</head>
<!-- /home/web/build/main-build/main/Auth/admin/signup.php -->
<!-- /home/web/build/main-build/main/Auth/mngr/signup.php -->
<!-- /home/web/build/main-build/main/Auth/admin/login.php -->
<!-- /home/web/build/main-build/main/Auth/mngr/login.php -->

<body>
    <?php

    include 'model.php';
    $model = new Model();
    $insert = $model->insert();

    ?>
    <div class="signup_">
        <div class="signup">
            <h3>Admin Signup Form</h3>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="">First Name</label>
                <input placeholder="Enter First Name" required type="text" name="first_name">
            </div>
            <div class="form-group">
                <label for="">Last Name</label>
                <input placeholder="Enter Last Name" required type="text" name="Last_name">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input placeholder="Enter Email" required type="email" name="admin_email">
            </div>

            <div class="form-group">
                <label for="">Address</label>
                <input placeholder="Enter Address" required type="text" name="admin_address">
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input name="admin_pass" placeholder="Enter Password" required type="password">
            </div>
            <div class="form-group">
                <label for="">confuirm password</label>
                <input name="cpass" placeholder="Enter cpass" required type="password">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">SignUp</button>
            </div>
            if you have an account <a href="login.php">login</a>

        </form>
    </div>

</body>

</html>