<?php

class Model
{

	private $server = "localhost";
	private $username = "root";
	private $password = "root";
	private $db = "ecome";
	private $conn;

	public function __construct()
	{
		$this->check_admin();
		try {

			$this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
		} catch (Exception $e) {
			echo "connection failed" . $e->getMessage();
		}
	}

	public function check_admin()
	{
		session_start();
		if (!$_SESSION['admin_id']) {
			header('location: /Auth/customer/login.php');
		}
	}

	public function insert()
	{

		if (isset($_POST['submit'])) {
			echo "<pre>";
			// exit;
			if (
				isset($_POST['Pro_title']) &&
				isset($_POST['Pro_price']) &&
				isset($_POST['Pro_desc']) &&
				isset($_FILES['Pro_image']['name'])

			) {
				if (
					!empty($_POST['Pro_title']) &&
					!empty($_POST['Pro_price'])  &&
					!empty($_FILES['Pro_image']['name'])
					&& !empty($_POST['Pro_desc'])
				) {
					// if (filter_var($_POST['Pro_title'], FILTER_VALIDATE_EMAIL)
					//  &&  filter_var($_POST['Pro_price'], FILTER_SANITIZE_SPECIAL_CHARS)
					//  &&  filter_var($_POST['Pro_desc'], FILTER_SANITIZE_SPECIAL_CHARS) 
					//   ) {
					$Pro_title = $_POST['Pro_title'];
					$Pro_price = $_POST['Pro_price'];
					$Pro_desc = $_POST['Pro_desc'];

					$brand_brand_id =	$_POST['brand_brand_id'];
					$admin_admin_id =	$_SESSION['admin_id'];
					$catagory_Cat_id =	$_POST['catagory_Cat_id'];
					// var_dump($_FILES['Pro_image']);
					if (isset($_FILES['Pro_image'])) {
						$img_name = $_FILES['Pro_image']['name'];
						$img_type = $_FILES['Pro_image']['type'];
						$tmp_name = $_FILES['Pro_image']['tmp_name'];

						$img_explode = explode('.', $img_name);
						$img_ext = end($img_explode);
						// var_dump($img_ext);
						$extensions = ["jpeg", "png", "jpg"];
						// if (in_array($img_ext, $extensions) === true) {
						// $types = ["jpeg", "jpg", "png"];
						// if (in_array($img_type, $types) === true) {
						$time = time();
						$new_img_name = $time . $img_name;
						if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
							$query = "INSERT INTO products (Pro_title,Pro_price,Pro_desc,Pro_image,
				      	brand_brand_id,admin_admin_id,catagory_Cat_id) 
							VALUES ('$Pro_title','$Pro_price','$Pro_desc',
							'$new_img_name','$brand_brand_id','$admin_admin_id',
							'$catagory_Cat_id')";
							// var_dump($_SESSION);
							// var_dump($query);
							if ($sql = $this->conn->query($query)) {
								echo "<script>alert('records added successfully');</script>";
								echo "<script>window.location.href = '/user/Admin/Product/products.php';</script>";
							} else {
								// var_dump($sql);
								//  var_dump (mysqli_error_list($this->conn));
								echo "<script>alert('connection failed');</script>";
								// echo "<script>window.location.href = '/';</script>";
							}
						} else {
							echo "Something went wrong. Please try again!";
						}
					}
					// } else {
					// 	echo "Please upload an image file - jpeg, png, jpg";
					// }
					// } else {
					// 	echo "Please upload an image file - jkpeg, png, jpg";
					// }

					// } else {
					//     echo "<script>alert('empty');</script>";
					//     // echo "<script>window.location.href = '/';</script>";
					// }
				}
			}
		}
	}
	public function fetch()
	{
		$data = null;

		$query = "SELECT * FROM products ORDER BY Pro_id DESC";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function fetch_cat()
	{
		$cat = null;

		$query = "SELECT * FROM catagory";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$cat[] = $row;
			}
		}
		return $cat;
	}
	public function fetch_brand()
	{
		$cat = null;

		$query = "SELECT * FROM brand";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$cat[] = $row;
			}
		}
		return $cat;
	}

	public function delete($id)
	{

		$query = "DELETE FROM products where Pro_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($id)
	{

		$data = null;

		$query = "SELECT * FROM products WHERE Pro_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function edit($id)
	{

		$data = null;

		$query = "SELECT * FROM products WHERE Pro_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data)
	{

		$query = "UPDATE products SET Pro_title='$data[Pro_title]', 
		Pro_desc='$data[Pro_desc]', Pro_price='$data[Pro_price]',
			brand_brand_id='$data[brand_brand_id]',
		admin_admin_id='$data[admin_id]',
		catagory_Cat_id='$data[catagory_Cat_id]',
	    Pro_image='$data[Pro_image]' WHERE Pro_id='$data[id]'";
		// var_dump($query);
		// exit;
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}
