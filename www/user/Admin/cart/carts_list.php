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
    $model = new product_model();
    $rows = $model->carts__list();
    $cart = $model->cart_add();
    
    session_start();

   $id= $_SESSION['id'][0];
    if (!empty($rows)) {
        foreach ($rows as $row) {
    ?>
    <div class="item">
            <div class="img">
                <img src="img/<?php
                //  echo $row['Pro_desc']; ?>" alt="">
            </div>
            <div class="buttons">
                <button>view Product</button>
                <form action="" method="POST">
                <input placeholder="Enter First Name" value="<?php echo $row['qnty']; ?>"  type="integer" name="qnty">
                <input placeholder="Enter First Name" value="<?php echo $row['product_pro_id']; ?>"  type="integer" name="product_pro_id">
                <input placeholder="Enter First Name" value="<?=$id ?>"  type="integer" name="customer_cust_id">
                    

                <button type="submit" name="cart">Add to Cart</button>
                </form>
            </div>
        </div>
            <tr>
                <td><?php
                //  echo $i++; ?></td>
                <td><?php
                //  echo $row['Pro_title']; ?></td>
                <td><?php
                //  echo $row['Pro_price']; ?></td>
                <td><?php
                //  echo $row['Pro_desc']; ?></td>
                <td>
            </tr>

    <?php
        }
    } else {
        echo "no data";
    }
    ?>

    </div>

</body>

</html>