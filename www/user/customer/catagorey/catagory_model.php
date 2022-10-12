<?php

class catagory_model
{

	private $server = "localhost";
	private $username = "root";
	private $password = "root";
	private $db = "ecome";
	private $conn;


	public function __construct()
	{
		// $this->check_admin();

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
	public function check_admin()
	{
		// session_start();
		// if (!$_SESSION['cust_id']) {
		// 	header('location: /Auth/customer/login.php');
		// }
	}

	public function get($key)
	{
		session_start();
		return	$_SESSION[$key][0];
	}

	public function insert()
	{

		if (isset($_POST['submit'])) {
			// echo "<pre>";

			if (
				isset($_POST['cat_title']) &&
				isset($_POST['cat_desc'])

			) {

				if (
					!empty($_POST['cat_title'])
					&& !empty($_POST['cat_desc'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					$cat_title = $_POST['cat_title'];
					$cat_desc = $_POST['cat_desc'];

					$query = "INSERT INTO catagory (cat_title,cat_desc) 
							VALUES ('$cat_title','$cat_desc')";

					if ($sql = $this->conn->query($query)) {
						echo "<script>alert('catagory added successfully');</script>";
						echo "<script>window.location.href = 'catagories.php';</script>";
					} else {
						echo "<script>alert('failed');</script>";
						// echo "<script>window.location.href = '/';</script>";
					}
				} else {
					echo "<script>alert('empty');</script>";
					// echo "<script>window.location.href = '/';</script>";
				}
			}
		}
	}



	public function fetch()
	{
		$data = null;
		$cat_id = $_REQUEST['cat_id'];

		$query = "SELECT * FROM products where catagory_Cat_id = '$cat_id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}


	public function _brand()
	{
		$data = null;
		$br_id = $_REQUEST['by_id'];

		$query = "SELECT * FROM products where brand_brand_id = '$br_id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function delete($id)
	{

		$query = "DELETE FROM catagory where cat_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($id)
	{

		$data = null;

		$query = "SELECT * FROM catagory WHERE cat_id = '$id'";
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

		$query = "SELECT * FROM catagory WHERE cat_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		return $data;
	}

	public function update($data)
	{


		$query = "UPDATE catagory SET 
		cat_title='$data[cat_title]',cat_desc='$data[cat_desc]'
		 WHERE cat_id='$data[cat_id]'";


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
			// echo "<pre>";

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
					$pro = $_POST['product_pro_id'];
					$cust_id = $_POST['customer_cust_id'];
					$qury = "SELECT * FROM cart WHERE product_pro_id = '$pro' AND customer_cust_id = '$cust_id'";
					$vsql = $this->conn->query($qury);
					if ($vsql->fetch_row() > 1) {

						echo "<script>alert('product is already exist in the cart!');</script>";
						// echo "<script>window.location.href = '/';</script>";
					} else {


						foreach ($_POST as $key => $value) {

							filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
						}
						$qnty = $_POST['qnty'];
						$product_pro_id = $_POST['product_pro_id'];
						$customer_cust_id = $_POST['customer_cust_id'];


						$query = "INSERT INTO cart (qnty,product_pro_id,customer_cust_id) 
							VALUES ('$qnty','$product_pro_id','$customer_cust_id')";

						if ($sql = $this->conn->query($query)) {

							echo "<script>alert('product added to the cart successfully');</script>";
							// echo "<script>window.location.href = '/';</script>";
						} else {
							echo "<script>alert('something wrong!');</script>";

							// echo "<script>window.location.href = '/';</script>";
						}
					}
				} else {
					echo "<script>alert('something wrong!');</script>";
					// echo "<script>window.location.href = '/';</script>";
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
			// echo "<pre>";

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

						echo "<script>alert('catagory added successfully');</script>";
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
