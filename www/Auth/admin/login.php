<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/app.css">
</head>

<body>
    <?php

    include 'model.php';
    $model = new Model();
    $insert = $model->login();

    ?>
    <div class="signup_">
        <div class="signup">
            <h3>Admin Login Form</h3>
        </div>
        <form action="" method="post">

            <div class="form-group">
                <label for="">Email</label>
                <input placeholder="Email" required type="text" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" placeholder="Enter Password" required type="password">
            </div>
            if you don't have an account <a href="signup.php">signup</a>
            <div class="form-group">
                <button type="submit" name="submit">login</button>
            </div>
        </form>
    </div>

</body>

</html>