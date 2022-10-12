<?php
include_once "header.php";
?>
<style lang="">
    .left-link {
        /* background-color:bleue; */
        padding-left: 3rem;
    }
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

include 'model.php';
$model = new Model();
$type = $_REQUEST['type'];
$rows = $model->types($type);

?>
<title><?php
        echo $model->name;
        ?></title>

<div class="container bra">
    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">
                <?php
                echo $model->name;
                ?> </h1>
            <hr style="height: 1px;color: black;background-color: black;">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>

                    </tr>
                </thead>
                <tbody>
                    <?php



                    $i = 1;
                    if (!empty($rows)) {

                        foreach ($rows as $row) {

                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>

                                    <a href="
                                        <?php
                                        if ($type == 'brand') {
                                            echo './catagorey/byBrand.php?by_id=' . $row['brand_id'] . '';
                                        } else {
                                            echo '
                                                     ./catagorey/catagories.php?cat_id=' . $row['cat_id'] . '';
                                        }

                                        ?>
                                                    ">


                                        <?php echo $row[$model->plus . 'title']; ?>
                                    </a>

                                </td>
                                <td>
                                    <a href="
                                        <?php
                                        if ($type == 'brand') {
                                            echo './catagorey/byBrand.php?by_id=' . $row['brand_id'] . '';
                                        } else {
                                            echo '
                                                     ./catagorey/catagories.php?cat_id=' . $row['cat_id'] . '';
                                        }

                                        ?>
                                                    ">

                                        <?php echo $row[$model->plus . 'desc']; ?>

                                    </a>

                                </td>

                            </tr>

                    <?php
                        }
                    } else {
                        echo "no data";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>