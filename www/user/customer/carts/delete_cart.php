<?php 

	include 'product_model.php';
	$model = new Product_model();
	$id = $_REQUEST['id'];
	$delete = $model->delete($id);

	if ($delete) {
		echo "<script>alert('Product removed from cart successfully!');</script>";
		echo "<script>window.location.href = 'cart.php';</script>";
	}

 ?>