<?php
include_once "header.php";

?>

<link rel="stylesheet" href="../../css/app.css">
<style lang="">
    h3 {
        margin-top: 60px !important;
    }
    .nav{
        padding-left: 0rem !important;
    }

    .row {
        width: 50rem;
    }

    .left-link {
        /* background-color:bleue; */
        padding-left: 10rem;
    }
</style>
<div class="signup_a">
    <div class="signup">
        <div class="col-md-12 mt-5 h3" margin-top="10rem !important">
            <h3 class="text-center"> EDIT Profile</h3>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 mx-auto">
            <?php

            include 'model.php';
            $model = new Model();
            $id = $_SESSION['cust_id'];

            // $id = $model->get('cust_id');e/
            $row = $model->edit($id);
// var_dump($row);
            if (isset($_POST['update'])) {
                // var_dump($_POST);
                if (
                    isset($_POST['first_name']) &&
                    isset($_POST['last_name']) && isset($_POST['first_name'])
                    && isset($_POST['password']) && isset($_POST['email'])
                    && isset($_POST['address'])
                ) {

                    // if (
                    //     !empty($_POST['first_name']) &&
                    //     !empty($_POST['last_name'])  &&
                    //     !empty($_FILES['cust_image']['name'])
                    //     && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone'])
                    //     && !empty($_POST['address'])
                    // ) {

                    $data['id'] = $id;
                    $data['first_name'] = $_POST['first_name'];
                    $data['last_name'] = $_POST['last_name'];
                    $data['email'] = $_POST['email'];
                    $data['address'] = $_POST['address'];
                    // $data['balance'] = $_POST['balance'];
                    // $data['cust_image'] = $_FILES['cust_image']['name'] ?? $row['cust_image'];
                    $data['password'] = $_POST['password'];
                    if ($_FILES['cust_image']['name']) {
                        $img_name = $_FILES['cust_image']['name'];
                        $img_type = $_FILES['cust_image']['type'];
                        $tmp_name = $_FILES['cust_image']['tmp_name'];

                        $img_explode = explode('.', $img_name);
                        $img_ext = end($img_explode);
                        // var_dump($img_ext);
                        $extensions = ["jpeg", "png", "jpg"];
                        if (in_array($img_ext, $extensions) === true) {
                            // $types = ["jpeg", "jpg", "png"];
                            // if (in_array($img_type, $types) === true) {
                            $time = time();
                            $new_img_name = $time . $img_name;
                            if (move_uploaded_file($tmp_name, "../../Auth/customer/images/" . $new_img_name)) {
                                $data['cust_image'] = $new_img_name;
                                $update = $model->update($data);
                                if ($update) {
                                    echo "<script>alert('Profile update successfully');</script>";
                                    echo "<script>window.location.href = '/user/customer/profile.php';</script>";
                                    echo "<script>window.location.replace = '/user/customer/profile.php';</script>";
                                } else {
                                    echo "<script>alert('Profile update failed');</script>";
                                    // echo "<script>window.location.replace('/user/Admin/Product/products.php');</script>";
                                }
                            } else {
                                echo "Something went wrong. Please try again!";
                            }
                        }
                    } else {
                        $data['cust_image'] =  $row['cust_image'];
                        $update = $model->update($data);
                        if ($update) {
                            echo "<script>alert('Profile update successfully');</script>";
                            // echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
                        } else {
                            echo "<script>alert('Profile update failed');</script>";
                            // echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
                        }
                    }
                } else {
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                    // }s
                }
            }

            ?>

            <form action="" method="post" enctype="multipart/form-data" class="form">
                <img src="../../Auth/customer/images/<?= $row['cust_image']; ?>" width="100rem" style="border-radius: 50%; border:3px solid blueviolet;" height="200rem">
                <div class="form-group">
                    <label for="">Profile Picture</label>
                    <input value="<?php echo $row['cust_image']; ?>" type="file" placeholder="insert" name="cust_image">
                </div>
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
                    <label for="">Address</label>
                    <input placeholder="Enter Address" value="<?php echo $row['address']; ?>" type="text" name="address">
                </div>
                <!-- <div class="form-group">
                    <label for="">Balance</label>
                    <input placeholder="Enter Address" value="<?php
                                                                //  echo $row['balance']; 
                                                                ?>" type="text" name="balance">
                </div> -->

                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" placeholder="Enter Password" value="<?php echo "XXXXXXX";
                                                                                //  $row['password']; 
                                                                                ?>" type="password">
                </div>

                <div class="form-group">
                    <center>
                        <button type="submit" name="update" class="update">Update</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html>