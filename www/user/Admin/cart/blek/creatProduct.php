<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="../../css/app.css">
</head>

<body>
    <?php

    include 'product_model.php';
    $model = new product_model();
    $insert = $model->insert();

    ?>
    <div class="signup_">
        <div class="signup">
            <p>Add Product</p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Title</label>
                <input placeholder="Enter Title" type="text" name="Pro_title">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input placeholder="Enter Price" type="text" name="Pro_price">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <input placeholder="Enter Description" type="text" name="Pro_desc">
            </div>

            <div class="form-group">
                <label for="">Product Image</label>
                <input type="file" placeholder="Enter Product Image" name="Pro_image">
            </div>
            <div class="form-group">

                <label for="">Catagory</label>

                <select name="catagory_Cat_id" id="">
                    <option value=""></option>
                </select>
            </div>


            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

</body>

</html>