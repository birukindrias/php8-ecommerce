<!DOCTYPE html>
<html lang="en">
<?php

include 'model.php';
$model = new Mnger_model();
$rows = $model->check_mngr();

?>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/app.css">

    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ecom</title>
    <!-- <link rel="stylesheet" href="/user/customer/css/app.css"> -->
    <style lang="">
        nav a {
            color: white;
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav">
            <div class="left-link">
                <a href="/user/Manager/">Home</a>
                <!-- <a href="./user/Admin/Products/creatProduct.php">Product</a> -->
                <!-- <a href="./Product/products.php">Products</a> -->
                <a href="/user/Manager/cust/catagories.php">Admins</a>
                <!-- <a href="./user/Admin/Products/Products.php">Product</a> -->
                <!-- <a href="">About Us</a> -->
                <!-- <div class="search">
                    <form action="" method="post">
                        <input type="text" placeholder="Search Product" name="search" id="">
                        <button type="submit">search</button>
                    </form>
                </div> -->
                <a href="               /user/Manager/order/order.php
                ">Orders</a>

            </div>

            <div class="right-link">
              
                <a href="/user/customer/logout.php">Logout</a>

            </div>
        </div>
    </nav>