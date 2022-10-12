<?php
include_once "../header.php";
?>
<div class="container">

    <div class="row">
        <div class="col-md-12 mt-5">
            <h1 class="text-center">Orders</h1>

            <a href="orderes.php"> Report</a>

            <hr style="height: 1px;color: black;background-color: black;">
        </div>

        <!-- <div><a href="create_catagory.php">create Order</a></div> -->

    </div>
    <div><a href="../index.php">Go Back</a></div>

    <div class="row">
        <div class="col-md-12">

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>first_name</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Quantuty</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'catagory_model.php';
                    $model = new order();
                    $rows = $model->fetch_order();
                    $i = 1;
                    if (!empty($rows)) {
                        foreach ($rows as $row) {
                    ?>
                            <tr>
                                <td><?php echo $row['cust_id']; ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['Pro_title']; ?></td>
                                <td><?php echo ($row['Pro_price'] * $row['qnty']) . "ETB"; ?></td>
                                <td><?php echo $row['qnty']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php
                                    echo $row['address']; ?></td>
                                <td width="20px">
                                    <?php
                                    //  echo $row['password']; 
                                    ?></td>
                                <td>
                                    <!-- <a id="ale" href="#" class="badge badge-success">Verify</a> -->
                                </td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "no orders  until";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let ale = document.querySelector('#ale').onclick = () => {
        alert("unadded new future");
    }
</script>
<!-- Optional JavaScript 
href="edit_catagory.php?id=<?php
                            // echo $row['cust_id']; 
                            ?>" -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>