<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>signup</title>
    <link rel="stylesheet" href="../../css/app.css">
</head>

<body>

    <div class="product">
        <div class="card">
            <div class="card-header">
                Carts List
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    include 'product_model.php';
                    $model = new Product_model();
                    session_start();
                    // $id = $_REQUEST['id'];
                    $rows = $model->carts__list();

                    if (!empty($rows)) {
                        foreach ($rows as $row) {

                    ?>

                            <tr>
                                <td><?= $row['Pro_title'] ?></td>
                                <td>Product Image</td>
                                <td>
                                    <input type="number" name="qnty" id="" value="1">
                                    <input type="integer" name="cust_id" id="" value="<?= $_SESSION['id'][0]; ?>">
                                    <input type="integer" name="prod_id" id="" value="<?= $row['Pro_id']; ?>">
                                </td>
                                <td><?= $row['Pro_price'] ?></td>
                                <td> <a href="delete_catagory.php?id=<?php echo $row['Pro_id']; ?>" class="badge badge-danger">Delete</a>
                                </td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "no data";
                    }
                    ?>
                </table>


            </div>
        </div>
    </div>
    <div class="action">
        <a href="">Update Shipping</a>
        <a href="">Continue Shipping</a>
        <a href="">Checkout</a>
        <div class="totial">
            <?php
            if (!empty($rows)) {
                foreach ($rows as $row) {
                    $price =  $row['Pro_price'] + $row['Pro_price'];
                }
            } ?>
            Total Price: <input type="text" value="<?= $price ?>">

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>