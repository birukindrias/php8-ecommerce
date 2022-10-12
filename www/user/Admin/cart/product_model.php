<?php

class Product_model
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
					$Pro_title = $_POST['Pro_title'];
					$Pro_price = $_POST['Pro_price'];
					$Pro_desc = $_POST['Pro_desc'];

					$Pro_image = $_FILES['Pro_image']['name'];

					$query = "INSERT INTO products (Pro_title,Pro_price,Pro_desc,Pro_image) 
							VALUES ('$Pro_title','$Pro_price','$Pro_desc','$Pro_image')";
					// var_dump($_POST);
					// var_dump($query);
					// exit;
					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('records added successfully');</script>";
						echo "<script>window.location.href = '/';</script>";
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

		$query = "SELECT * FROM records WHERE id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}
	public function login()
	{




		if (isset($_POST['submit'])) {
			if (isset($_POST['password']) && isset($_POST['email'])) {

				if (
					!empty($_POST['password']) && !empty($_POST['email'])
				) {
					foreach ($_POST as $key => $value) {

						if (filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {

							$email = $_POST['email'];
							$password = $_POST['password'];

							$data = null;

							$query = "SELECT * FROM users WHERE email = '$email' && password = '$password'";

							if ($sql = $this->conn->query($query)) {
								while ($row = $sql->fetch_assoc()) {
									if ($row) {
										$this->set('id', $row['cust_id']);

										echo "<script>alert('records is wright successfully');</script>";
										echo "<script>window.location.href = 'profile.php';</script>";
									}
								}
							}
						} else {
							echo "<script>alert('invalid input');</script>";
						}
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = 'index.php';</script>";
				}
			}
		}
	}

	public function edit($id)
	{

		$data = null;

		$query = "SELECT * FROM users WHERE cust_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data)
	{

		// cust_image = '$data[cust_image]=
		$query = "UPDATE users SET last_name='$data[last_name]',first_name='$data[first_name]', email='$data[email]',
		 phone='$data[phone]',
		  address='$data[address]',
		  		  cust_image='$data[cust_image]',

		  password='$data[password]'
		   WHERE cust_id='$data[id] '";


		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	// catagory


	public function get_catagory()
	{
		$data = null;

		$query = "SELECT * FROM catagory";
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

						echo "<script>alert('records added successfully');</script>";
						echo "<script>window.location.href = '/';</script>";
					} else {

						echo "<script>window.location.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = '/';</script>";
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

						echo "<script>alert('records added successfully');</script>";
						echo "<script>window.location.href = '/';</script>";
					} else {

						echo "<script>window.location.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = '/';</script>";
				}
			}
		}
	}
}
