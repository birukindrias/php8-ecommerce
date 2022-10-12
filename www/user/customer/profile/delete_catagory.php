<?php 

	include 'catagory_model.php';
	$model = new Model();
	$id = $_REQUEST['id'];
	$delete = $model->delete($id);

	if ($delete) {
		echo "<script>alert('deleted successfully');</script>";
		echo "<script>window.location.href = 'catagories.php';</script>";
	}

 ?>