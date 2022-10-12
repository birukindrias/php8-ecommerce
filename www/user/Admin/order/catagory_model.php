<?php

class order
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

	public function set($key, $value)
	{
		session_start();
		if (!$_SESSION[$key]) {
			$_SESSION[$key][] = $value;
		}
	}

	public function get($key)
	{
		session_start();
		// echo "<pre>";

		return	$_SESSION[$key][0];
	}

	public function insert()
	{

		if (isset($_POST['submit'])) {
			echo "<pre>";

			if (
				isset($_POST['brand_title']) &&
				isset($_POST['brand_desc'])

			) {

				if (
					!empty($_POST['brand_title'])
					&& !empty($_POST['brand_desc'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					$brand_title = $_POST['brand_title'];
					$brand_desc = $_POST['brand_desc'];

					$query = "INSERT INTO brand (brand_title,brand_desc) 
							VALUES ('$brand_title','$brand_desc')";

					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('brand added successfully');</script>";
						echo "<script>window.location.href = 'catagories.php';</script>";
					} else {
						echo "<script>alert('failed');</script>";
						// echo "<script>window.lobrandion.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					// echo "<script>window.lobrandion.href = '/';</script>";
				}
			}
		}
	}



	public function fetch_order()
	{
		$data = null;
		// session_start();

		// $id = $_SESSION['cust_id'];

		// var_dump($id);
		echo "<pre>";
		$query = "SELECT * FROM `order` LEFT JOIN
		 users ON
	users.cust_id=	 `order`.customer_cust_id 
		 LEFT JOIN products ON
		 products.Pro_id = `order`.product_pro_id
		 ";
		// var_dump($query);e

		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		// var_dump(
		// 	mysqli_error_list($this->conn)
		// );
		foreach ($data as $key => $value) {
				// var_dump($value)
			;
		}
		return $data;
	}

	public function delete($id)
	{

		$query = "DELETE FROM cart where product_pro_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($id)
	{

		$data = null;

		$query = "SELECT * FROM brand WHERE brand_id = '$id'";
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

		$query = "SELECT * FROM brand WHERE brand_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data)
	{


		$query = "UPDATE brand SET 
		brand_title='$data[brand_title]',brand_desc='$data[brand_desc]'
		 WHERE brand_id='$data[brand_id]'";


		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	// brandagory


	public function get_brandagory()
	{
		$data = null;

		$query = "SELECT * FROM order";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	// cart

	public function cart_add()
	{

		if (isset($_POST['cart'])) {
			echo "<pre>";

			if (
				isset($_POST['qnty']) &&
				isset($_POST['product_pro_id']) &&
				isset($_POST['customer_cust_id'])

			) {

				if (
					!empty($_POST['qnty']) &&
					!empty($_POST['product_pro_id'])
					&& !empty($_POST['customer_cust_id'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					$qnty = $_POST['qnty'];
					$product_pro_id = $_POST['product_pro_id'];
					$customer_cust_id = $_POST['customer_cust_id'];


					$query = "INSERT INTO cart (qnty,product_pro_id,customer_cust_id) 
							VALUES ('$qnty','$product_pro_id','$customer_cust_id')";

					if ($sql = $this->conn->query($query)) {

						echo "<script>alert('brandagory added successfully');</script>";
						echo "<script>window.lobrandion.href = '/';</script>";
					} else {

						echo "<script>window.lobrandion.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.lobrandion.href = '/';</script>";
				}
			}
		}
	}


	public function carts__list()
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

	// checkout
	public function checkout()
	{

		if (isset($_POST['checkout'])) {
			echo "<pre>";

			if (
				isset($_POST['qnty']) &&
				isset($_POST['cust_id']) &&
				isset($_POST['prod_id'])

			) {

				if (
					!empty($_POST['qnty']) &&
					!empty($_POST['cust_id'])
					&& !empty($_POST['prod_id'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					$qnty = $_POST['qnty'];
					$cust_id = $_POST['cust_id'];
					$prod_id = $_POST['prod_id'];


					$query = "INSERT INTO cart (qnty,cust_id,prod_id) 
							VALUES ('$qnty','$cust_id','$prod_id')";

					if ($sql = $this->conn->query($query)) {

						echo "<script>alert('brandagory added successfully');</script>";
						echo "<script>window.lobrandion.href = '/';</script>";
					} else {

						echo "<script>window.lobrandion.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.lobrandion.href = '/';</script>";
				}
			}
		}
	}
}
