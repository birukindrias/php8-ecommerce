<?php

use Symfony\Component\Yaml\Dumper;

include_once "./../header.php";
?>
<style lang="">
    .ocard{
        width: 80%
        ;
        padding-inline: 3rem;
    }
    .ase{
        padding: 1rem;
        border-radius: 1.5rem;
        color: wheat;
        font-weight: bold;
        background-color: blueviolet;
    }
    .cae button{
        padding: 1rem;
        border-radius: 1.5rem;
        border-color: white;
        color: wheat;
        margin-left: 2rem;
        font-weight: bold;
        background-color: blueviolet;
    }
    h5 {

        color: red;
    }

    .product {
        margin-top: 5rem !important;
        width: 80rem !important;
    }

    th {
        width: 20rem;
    }
    tr{
        border-bottom: 1px solid black;
    }
    .card {
        /* background-color: black; */
        /* color: white; */
        width: 80rem !important;
    }
    img{
        width: 20rem;
        height: 20rem;
    }
</style>
<div class="product">
    <div class="card">
        <div class="card-header">
            Carts List
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th class="th">Product Name</th>
                    <th class="th">Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php
                // error_reporting = E_ALL & ~E_NOTICE & ~E_DEPRECATED
                // ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE); // Show all errors minus STRICT, DEPRECATED and NOTICES
                // ini_set('display_errors', 0); // disable error display
                // ini_set('log_errors', 0); // disable error logging
                $cart = " ";
                include 'product_model.php';
                $model = new Product_model();

                $rows = $model->fetch_cart_product();
                $rowse = $model->insert_order();
                $chk = $model->chekout();
                $update_cart = $model->update_cart();
                $pricetotal = 0;

                if (!empty($rows)) {

                    foreach ($rows as $row) {
                        // $man +=   ($row['Pro_price'] * $row['qnty']);
                        // $name .= $row['Pro_title'] . ",";
                ?>
                        <tr>
                            <td><?= $row['Pro_title'] ?></td>

                            <td><img src="./../../Admin/Product/images/<?= $row['Pro_image'] ?>" height="85rem" width="105rem"></td>
                            <td>

                                <form action="#" method="POST">

                                    <input type="number" class="qnty" name="qnty" id="value" value="<?= $row['qnty']; ?>">
                                    <input type="number" hidden name="cust_id" id="" value="<?= $_SESSION['cust_id']; ?>">
                                    <input type="number" hidden name="prod_id" id="" value="<?= $row['Pro_id']; ?>">
                                    <button type="submit" name="updateqnty">update</button>

                                </form>
                            </td>
                            <td id="value">
                                <p style="color:white    "> <?php $pricetotal += ($row['Pro_price'] * $row['qnty']);
                                                         echo   $pricetotal   ?>
                                </p>
                                <p class="priceo" style="  margin-left: 2rem;
"><?= $row['Pro_price'] . "ETB" ?>
                                </p>
                            </td>
                            <td>
                                <a href="delete_cart.php?id=<?php echo $row['Pro_id']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>


                <?php

                    }
                } else {
                    echo $cart .= '<h5 color="red">Cart is empty</h5>';
                }
                ?>
            </table>
            total Price: <h3 class="totalprice"></h3>

            <p class="prica" style="color:white "> <?php echo $pricetotal;
                                                    ?>
            </p>
        </div>
    </div>










</div>

<div class="totial" style="margin-top:3rem;">

    <a  class="ase" href="/user/customer/carts/cart.php">Update Shopping</a>

    <a class="ase" href="/user/customer/products/Products.php"> Continue Shopping</a>
    <?php
    if (!empty($rows)) {
    ?>
      <!-- <div class="cae">
        <form action="#" method="POST">
     
        <button  id="chko" type="submit" name="chk">
        Ready For Delevery
            </button>
        </form> -->
        <a class="ase" href="/user/customer/carts/chekout.php"> Ready For Delevery</a>
    <?php
    } ?>
</div>
</div>
<div class="ocard">
    <div class="card">
        <div class="card-header">
Your Orders        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th class="th">Product Name</th>
                    <th class="th">Product Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>

                <?php
                // error_reporting = E_ALL & ~E_NOTICE & ~E_DEPRECATED
                // ini_set('error_reporting', E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE); // Show all errors minus STRICT, DEPRECATED and NOTICES
                // ini_set('display_errors', 0); // disable error display
                // ini_set('log_errors', 0); // disable error logging
                $cart = " ";
                // include 'product_model.php';
                $model = new Product_model();

                $rows = $model->fetch_order();
                $rowse = $model->insert_order();
                $chk = $model->chekout();
                $update_cart = $model->update_cart();
                $orderpricetotal = 0;

                if (!empty($rows)) {

                    foreach ($rows as $row) {
                        // $man +=   ($row['Pro_price'] * $row['qnty']);
                        // $name .= $row['Pro_title'] . ",";
                ?>
                        <tr>
                            <td><?= $row['Pro_title'] ?></td>

                            <td><img src="./../../Admin/Product/images/<?= $row['Pro_image'] ?>" height="85rem" width="105rem"></td>
                            <td>

                                <form action="#" method="POST">

                                    <input type="number" class="qntyo" disabled  name="qnty" id="value" value="<?= $row['qnty']; ?>">
                                    <input type="number" hidden name="cust_id" id="" value="<?= $_SESSION['cust_id']; ?>">
                                    <input type="number" hidden name="prod_id" id="" value="<?= $row['Pro_id']; ?>">
                                    <!-- <button type="submit" name="updateqnty">update</button> -->

                                </form>
                            </td>
                            <td id="value">
                                <p style="color:white    "> <?php $orderpricetotal += ($row['Pro_price'] * $row['qnty']);
                                                         echo   $orderpricetotal   ?>
                                </p>
                                <p class="priceo" style="  margin-left: 2rem;
"><?= $row['Pro_price'] * $row['qnty']   . "ETB" ?>
                                </p>
                            </td>
                            <td>
                                <a href="delete_order.php?id=<?php echo $row['Pro_id']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>


                <?php

                    }
                } else {
                    echo $cart .= '<h5 color="red">You Do Not Have Any Orders yet.</h5>';
                }
                ?>
            </table>
            total Price: <h3 class="ordertotalprice"></h3>

            <p class="pricao" style="color:white "> <?php echo $orderpricetotal;
                                                    ?>
            </p>
        </div>
    </div>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    setInterval(() => {
        let qnty = document.querySelector('.qnty').value;
        let price = document.querySelector('.prica').innerText;
        let pricetotal = price;
        let totalprice = document.querySelector('.totalprice').innerText = pricetotal + "ETB";
        console.log(pricetotal);
    }, 1);
    setInterval(() => {
        let qnty = document.querySelector('.qntyo').value;
        let price = document.querySelector('.pricao').innerText;
        let pricetotalo = price;
        let totalprice = document.querySelector('.ordertotalprice').innerText = pricetotalo + "ETB";
        console.log(pricetotalo);
    }, 1);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>