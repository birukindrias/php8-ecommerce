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

    <div class="product">
        <?php

        include 'product_model.php';
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
                    <p>Name = <?php echo $row['name']; ?></p>
                    <p>Email = <?php echo $row['email']; ?></p>
                    <p>Mobile No. = <?php echo $row['mobile']; ?></p>
                    <p>Address = <?php echo $row['address']; ?></p>
                </div>
            </div>
        <?php
        } else {
            echo "no data";
        }
        ?>
    </div>

</body>

</html>