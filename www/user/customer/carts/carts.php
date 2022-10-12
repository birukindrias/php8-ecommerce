<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>PHP OOP CRUD TUTORIAL</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">PHP OOP CRUD TUTORIAL - EDIT RECORD</h1>
                <hr style="height: 1px;color: black;background-color: black;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 mx-auto">
                <?php

                include 'product_model.php';
                $model = new Product_model();
                // $id = $model->get($_SESSION['id']);

                $id = $model->get('id');
                $row = $model->edit($id);

                if (isset($_POST['update'])) {
                    if (
                        isset($_POST['first_name']) &&
                        isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_FILES['cust_image']['name'])
                        && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])
                        && isset($_POST['address'])
                    ) {

                        $data['id'] = $id;
                        $data['first_name'] = $_POST['first_name'];
                        $data['last_name'] = $_POST['last_name'];
                        $data['phone'] = $_POST['phone'];
                        $data['email'] = $_POST['email'];
                        $data['address'] = $_POST['address'];
                        $data['cust_image'] = $_FILES['cust_image']['name'] ?? $row['cust_image'];
                        $data['password'] = $_POST['password'];

                        $update = $model->update($data);

                        if ($update) {
                            echo "<script>alert('record update successfully');</script>";
                            // echo "<script>window.location.href = 'records.php';</script>";
                        } else {
                            echo "<script>alert('record update failed');</script>";
                            echo "<script>window.location.href = 'records.php';</script>";
                        }
                    } else {
                        echo "<script>alert('empty');</script>";
                        header("Location: edit.php?id=$id");
                    }
                }

                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input placeholder="Enter First Name" value="<?php echo $row['first_name']; ?>" type="text" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input placeholder="Enter Last Name" value="<?php echo $row['last_name']; ?>" type="text" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input placeholder="Email" value="<?php echo $row['email']; ?>" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input placeholder="Phone" value="<?php echo $row['phone']; ?>" type="text" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input placeholder="Enter Address" value="<?php echo $row['address']; ?>" type="text" name="address">
                    </div>
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                        <input value="<?php echo $row['cust_image']; ?>" type="file" placeholder="insert" name="cust_image">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" placeholder="Enter Password" value="<?php echo $row['password']; ?>" type="password">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="update">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>