<?php

if (!session_id()) {
    session_start();
}
// if ($_SESSION['cust_id']) {
//     # code...
// } else {
//     # code...
// }


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nahom and Naod</title>
    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">


    <style>
    .top_title {
        /* margin: 1rem; */
        /* background-color: yellow; */
        font-size: 3rem;
        /* width: 10rem; */
        /* height: 10rem; */
        position: absolute;
        width: 35rem;
        margin-left: -2rem;
        margin-top: -12rem;
    }

    a {
        color: rgb(255, 255, 255);
    }

    .products {
        margin-top: 3rem;
        height: 100vh;
        background-image: url(/img/ecommerce-850x491.jpg);
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: center;
        /* background-color: yellow; */
    }

    .box {
        margin-top: -30rem;
        /* padding-top: 10rem; */
        position: relative;
        width: 20rem;
        height: 10rem;
        /* background-color: rgb(255, 255, 255); */

        /* opacity: .3; */
        margin-left: 50rem;
    }


    .box p {
        font-wight: bold;
        font-size: 2rem;
        /* color: rgb(255, 255, 255) !important; */
        color: black !important;

    }

    .box b {
        font-wight: bold;
        color: black !important;
        font-size: 2rem;
        color: rgb(255, 255, 255) !important;
    }

    .inline_space {
        display: flex;
        flex-direction: row;
        margin-left: 5rem;

        font-weight: bold !important;
        color: gold !important;
        font-size: 1.5rem;


        /* color: rgb(255, 255, 255) !important; */
    }

    .inline_space>* {
        padding: 1rem;
        /* color: rgb(255, 255, 255) !important; */
    }
    </style>
</head>

<body>
    <nav>
        <div class="nav">
            <div class="left-link">
                <a href="/">Home</a>
                <!-- <a href="./user/Admin/Products/creatProduct.php">Product</a> -->
                <!-- <a href="./user/Admin/Products/Products.php">Product</a> -->

                <a href="Auth/customer/login.php">Brand</a>
                <a href="Auth/customer/login.php">Catagory</a>
                <a href="Auth/customer/login.php">About Us</a>
                <!-- <div class="search">
                    <form action="" method="post">
                        <input type="text" placeholder="Search Product" name="search" id="">
                        <button type="submit">search</button>
                    </form>
                </div> -->
            </div>
            <div class="right-link">
                <!-- <a href="./user/customer/signup.php">SignUp </a> -->
                <a href="Auth/customer/signup.php">SignUp </a>
                <a href="Auth/customer/login.php">login </a>
                <!-- <a href="Auth/admin/login.php">Admin login </a> -->

                <!-- <a href="./user/customer/login.php">Login</a> -->
                <!-- <a href="./user/Admin/Products/carts_list.php">Cart</a>
                <a href="./user/Admin/Products/cart.php">Carta</a>
           -->
            </div>
        </div>
    </nav>

    <div class="products">
        <!-- <div class="item">
            <div class="img">
                <img src="img/1.jpg" alt="">
            </div>
            <div class="buttons">
                <button>view Product</button>
                <button>Add to Cart</button>
            </div>
        </div>
        <div class="item">
            <div class="img">
                <img src="img/1.jpg" alt="">
            </div>
            <div class="buttons">
                <button>view Product</button>
                <button>Add to Cart</button>
            </div>
        </div>
        <div class="item">
            <div class="img">
                <img src="img/1.jpg" alt="">
            </div>
            <div class="buttons">
                <button>view Product</button>
                <button>Add to Cart</button>
            </div>
        </div> -->
        <!-- <p>Welcome</p> -->
    </div>

    <div class="box">
        <!-- <div class="top_title">
        <p>
        </p>
    </div> -->
        <p>Welcome
            Shop Here</p>


    </div>
    <!-- <div class="inline_space">
        <p class="ine">Reliable Products</p>
        <p class="ine">Fair Price</p>
        <p class="ine">Easy</p>

    </div> -->

    <script>
    let a = document.querySelector('a');
    a.onclick = () => {
        // window.location.href = '/Auth'
    }


    let str_len = str_length('$2y$10$AiyWYY5nFNcsSKtTRSenXOLA2T24PyXMZwL1LPdhBQQdXeQxYftR.');
    console.log(str_len);
    </script>
</body>

</html>