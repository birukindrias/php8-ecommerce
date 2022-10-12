<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ecom</title>
    <link rel="stylesheet" href="/user/customer/css/app.css">


</head>

<body>
    <nav>
        <div class="nav">
            <div class="left-link">
                <a href="/user/customer/">Home</a>
                <!-- <a href="./user/Admin/Products/creatProduct.php">Product</a> -->
                <a href="/user/customer/products/Products.php">Products</a>

                <a href="/user/customer/types.php?type=brand">Brand</a>
                <a href="/user/customer/types.php?type=Catagory">Catagory</a>
                <a href="/user/customer/about.php">About Us</a>
                <div class="search">
                    <form action="/user/customer/products/search_Products.php" method="get">
                        <input type="text" placeholder="Search Product" name="search" id="" required>
                        <button type="submit">search</button>
                    </form>
                </div>
            </div>
            <div class="right-link">
                <!-- <a href="./user/customer/signup.php">SignUp </a> -->
                <!-- <a href="Auth/choose_signup.php">SignUp </a>
                <a href="Auth/customer/login.php">login </a> -->
                <a href="/user/customer/profile.php">Profile</a>

                <a href="/user/customer/carts/cart.php">Cart</a>

                <a href="/user/customer/logout.php">Logout</a>

                <!-- <a href="./user/customer/login.php">Login</a> -->
                <!-- <a href="./user/Admin/Products/carts_list.php">Cart</a>
                <a href="./user/Admin/Products/cart.php">Carta</a> -->
            </div>
        </div>
    </nav>