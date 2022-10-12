<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
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
            <p>signup Form</p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
        
            <div class="form-group">
                <label for="">Email</label>
                <input placeholder="Email" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" placeholder="Enter Password" type="password">
            </div>
          
            <div class="form-group">
                <button type="submit" name="submit">login</button>
            </div>
        </form>
    </div>

</body>

</html>