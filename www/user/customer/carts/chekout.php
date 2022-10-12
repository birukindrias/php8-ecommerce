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
        <form action="#" method="POST">
            <?php
            include 'product_model.php';
            $model = new Product_model();

            $rows = $model->edit();
            $row = $model->update($rows);

            $data = $model->chekout();

            // $rowse = $model->insert_order();
            // $chk = $model->chekout();
            // $update_cart = $model->update_cart();
            $pricetotal;
            // var_dump($rows);

            if (!empty($rows)) {

                $rows
                //         $man +=   ($row['Pro_price'] * $row['qnty']);
                //         $name .= $row['Pro_title'] . ",";
            ?>
                Your Address
                <input type="text" name="address" value="<?= $rows['address']; ?>">
            <?php


            } else {
                echo $cart .= '<h5 color="red">Cart is empty</h5>';
            }
            ?>
            <button id="chko" type="submit" name="chk">order</button>
        </form>
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


    // let buton = document.querySelector ('#chko').onclick = ()=>{
    // }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>