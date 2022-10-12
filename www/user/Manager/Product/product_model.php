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
		try {

			$this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
		} catch (Exception $e) {
			echo "connection failed" . $e->getMessage();
		}
	}


	public function insert()
	{

		if (isset($_POST['submit'])) {
			echo "<pre>";

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
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					// var_dump($_POST);
					// var_dump($_FILES);
					$Pro_title = $_POST['Pro_title'];
					$Pro_price = $_POST['Pro_price'];
					$Pro_desc = $_POST['Pro_desc'];

					$brand_brand_id =	$_POST['brand_brand_id'];
					$admin_admin_id =	$_SESSION['id'] ?? 1;
					// var_dump($admin_admin_id);
					$catagory_Cat_id =	$_POST['catagory_Cat_id'];

					$Pro_image = $_FILES['Pro_image']['name'];

					$query = "INSERT INTO products (Pro_title,Pro_price,Pro_desc,Pro_image,
					brand_brand_id,admin_admin_id,catagory_Cat_id) 
							VALUES ('$Pro_title','$Pro_price','$Pro_desc','$Pro_image','$brand_brand_id','$admin_admin_id','$catagory_Cat_id')";

					var_dump($query);
					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('records added successfully');</script>";
						echo "<script>window.location.href = 'products.php';</script>";
					} else {
						echo "<script>alert('failed');</script>";
						echo "<script>window.location.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = '/';</script>";
				}
			}
		}
	}

	public function fetch()
	{
		$data = null;

		$query = "SELECT * FROM products";
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
		admin_admin_id='$data[admin_admin_id]',catagory_Cat_id='$data[catagory_Cat_id]',
	    Pro_image='$data[Pro_image]' WHERE Pro_id='$data[id]'";

		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}
