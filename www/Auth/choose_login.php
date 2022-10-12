<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecom</title>
    <link rel="stylesheet" href="/bui/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bui/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/app.css">


    <style>
        a {
            color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav">
            <div class="left-link">
                <a href="/">Home</a>
                <a href="/Auth/customer/login.php">Brand</a>
                <a href="/Auth/customer/login.php">Catagory</a>
                <a href="/Auth/customer/login.php">About Us</a>
            </div>
            <div class="right-link">
                <!-- <a href="./user/customer/signup.php">SignUp </a> -->
                <a href="/Auth/choose_signup.php">SignUp </a>
                <a href="/Auth/customer/login.php">login </a>

                <!-- <a href="./user/customer/login.php">Login</a> -->
                <!-- <a href="./user/Admin/Products/carts_list.php">Cart</a>
                <a href="./user/Admin/Products/cart.php">Carta</a>
           -->
            </div>
        </div>
    </nav>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(186, 233, 248);
        }

        .main {
            width: 100%;
            padding: 10%;


        }

        .main_pop {
            transition: all .5s;
            height: 50vh;
            display: grid;
            place-content: center;
            background-color: aqua;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-align: center;
            opacity: .8;
            border-radius: 1.5rem;
        }

        .text {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        h1 {
            margin-left: 3rem;
            padding: 1rem;
            background-color: green;
            border-radius: .5rem;
            cursor: pointer;
        }

        button {
            background-color: blueviolet;
            border: none;
            border-radius: 1rem;
            margin-top: 1rem;
            color: white;
            padding: .2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: large;
        }

        .h2 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            font-size: 3em;
            margin-top: 8rem;
        }

        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <center class="h2">
        <h2>Login As</h2>

    </center>
    <section class="main">

        <div class="main_pop">
            <div class="text">
                <h1>
                    <a href="./mngr/login.php">Manager</a>

                </h1>
                <h1 style=" background:blue;color:white">
                    <a href="./customer/login.php">Customer</a>

                </h1>
                <h1 style=" background:blue;color:white">
                    <a href="./admin/login.php">Admin</a>

                </h1>
            </div>

        </div>
        if you don't have an account <a href="choose_signup.php" style=" color:blue;">Signup</a>

    </section>
</body>

</html>