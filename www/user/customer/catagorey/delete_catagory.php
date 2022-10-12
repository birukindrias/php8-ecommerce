<?php 

	include 'catagory_model.php';
	$model = new catagory_model();
	$id = $_REQUEST['id'];
	$delete = $model->delete($id);

	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'catagories.php';</script>";
	}

 ?>