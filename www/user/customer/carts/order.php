<?php

use Symfony\Component\Yaml\Dumper;

include_once "./../header.php";
?>
<style lang="">
    h5 {
        color: red;
    }

    .product {
        width: 200rem;
    }

    th {
        width: 20rem;
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

                if (!empty($rows)) {

                    foreach ($rows as $row) {
                        $man +=   ($row['Pro_price'] * $row['qnty']);
                        $name .= $row['Pro_title'] . ",";
                ?>
                        <tr>
                            <td><?= $row['Pro_title'] ?></td>

                            <td><img src="./../../Admin/Product/images/<?= $row['Pro_image'] ?>" height="85rem" width="105rem"></td>
                            <td>

                                <form action="#" method="POST">

                                    <input type="number" class="qnty" name="qnty" id="value" value="1">
                                    <input type="number" name="cust_id" id="" value="<?= $_SESSION['cust_id']; ?>">
                                    <input type="number" name="prod_id" id="" value="<?= $row['Pro_id']; ?>">
                                    <button type="submit" name="chk">update</button>

                                </form>
                            </td>
                            <td id="value">
                          
                                <p class="price"><?= $row['Pro_price'] ?>
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


        </div>
    </div>
</div>

<div class="totial" style="margin-top:3rem;">

    <a href="/user/customer/carts/cart.php">Update Shipping</a>

    <a href="/user/customer/products/Products.php"> Continue Shipping</a>
</div>


</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    setInterval(() => {
        let qnty = document.querySelector('.qnty').value;
        let price = document.querySelector('.priceo').innerText;
        let pricetotal = (qnty * price);
        let totalprice = document.querySelector('.totalprice').innerText = pricetotal + "ETB";
        // console.log(pricetotal);
    }, 1);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>