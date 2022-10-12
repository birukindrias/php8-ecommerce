<?php
include_once "../header.php";
?>
<div class="product">

    <?php

    include 'product_model.php';
    $model = new product_model();
    // var_dump($_GET['search']);
    $title = $_GET['search'];
    $rows = $model->fetch_search();
    $rowes = $model->cart_add();

    // var_dump($id);
    if (!empty($rows)) {
        foreach ($rows as $row) {
    ?>
            <div class="item">
                <center>
                    <?php echo $row['Pro_title']; ?>
                    <div class="img">
                        <img src="/user/Admin/Product/images/<?php echo $row['Pro_image']; ?>" alt="">
                    </div>
                    <div class="buttons">
                        <button><a href="product.php?id=<?= $row['Pro_id'] ?>"> view Product</a></button>

                        <form action="" method="POST">
                            <input placeholder="Enter First Name" hidden value="<?php echo $row['Pro_id']; ?>" type="integer" name="product_pro_id">
                            <input placeholder="Enter First Name" hidden value="1" type="integer" name="qnty">
                            <input placeholder="Enter First Name" hidden value="<?= $_SESSION['cust_id'] ?>" type="integer" name="customer_cust_id">
                            <button type="submit" name="cart">Add to Cart</button>
                        </form>
                    </div>
                </center>
            </div>
    <?php
        }
    } else {
        echo "no data";
    }
    ?>

</div>
</body>

</html>