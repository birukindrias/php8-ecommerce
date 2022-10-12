<?php

class Product_model
{

	private $server = "localhost";
	private $username = "root";
	private $password = "root";
	private $db = "ecome";
	public $conn;

	public function __construct()
	{
		$this->check_admin();

		try {

			$this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
		} catch (Exception $e) {
			echo "connection failed" . $e->getMessage();
		}
	}

	public function set($key, $value)
	{
		if (session_id()) {
			echo "nooo";
			session_start();
		}
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


	public function chekout()
	{
		if (isset($_POST['chk'])) {
			// $pro =  $_POST['prod_id'];
			$pid = $_SESSION['cust_id'];
			$id = $_SESSION['cust_id'];
			$query = "SELECT * FROM cart WHERE customer_cust_id = '$id'";
			$carts = mysqli_query($this->conn, $query);
			// exit;

			// $qury = "SELECT * FROM orders WHERE product_pro_id = '$pro' AND customer_cust_id = '$id'";
			// $vsql = $this->conn->query($qury);

			// if ($vsql->fetch_row() > 1) {
			// 	echo "<script>alert('product is already exist in your order list!');</script>";
			// 	// echo "<script>window.location.href = '/';</script>";
			// } else {
			$data = [];
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			$date = date('Y-m-d H:i:s');
			foreach ($data as $key) {
				$qntyi = $key['qnty'];
				$product_pro_id = $key['product_pro_id'];
				$customer_cust_id = $_SESSION['cust_id'];

				$query = "INSERT INTO `order` (qnty,order_date,product_pro_id,customer_cust_id) 
                     VALUES ('$qntyi','$date','$product_pro_id','$customer_cust_id')";
				$order = mysqli_query($this->conn, $query);
			}
			$sql = "DELETE FROM cart WHERE customer_cust_id = '$id'";
			$cart = mysqli_query($this->conn, $sql);
			if ($cart) {
				echo "<script>alert('Your delivery is on the way!');</script>";
				echo "<script>window.location.href = '/user/customer/products/Products.php';</script>";
			}
			// }
		} else {
			# code...
		}
	}

	public  function insert_orders()
	{
		if (isset($_POST['cart'])) {
			echo "<pre>";

			if (
				isset($_POST['qnty']) &&
				isset($_POST['prod_id'])
				// isset($_SESSION['id'][0])

			) {

				if (
					!empty($_POST['qnty']) &&
					// !empty($_SESSION['id'][0])
					!empty($_POST['prod_id'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					session_start();
					$id  = $_SESSION['cust_id'];

					$sql_cart_drop = "DELETE * FROM cart WHERE customer_cust_id = '$id'";

					if ($sql = $this->conn->query($sql_cart_drop)) {

						echo "<script>alert('Product is already in the cart.');</script>";
					}
					$qnty = $_POST['qnty'];
					$prod_id = $_POST['prod_id'];
					$cust_id = $_SESSION['cust_id'];
					$pro = $_POST['product_pro_id'];
					$cust_id = $_POST['customer_cust_id'];
					$qury = "SELECT * FROM cart WHERE product_pro_id = '$pro' AND customer_cust_id = '$cust_id'";
					$qury = "DELETE cart WHERE product_pro_id = '$pro' AND customer_cust_id = '$cust_id'";

					if ($sql = $this->conn->query($qury)) {

						echo "<script>alert('Product is already in the cart.');</script>";
					} else {



						$query = "INSERT INTO `order` (qnty,prod_id,cust_id) 
							VALUES ('$qnty','$prod_id','$cust_id')";
						// var_dump(mysqli_error($this->conn));
						if ($sql = $this->conn->query($query)) {
							// var_dump($sql);
							$query = "DELETE FROM cart where customer_cust_id = '$cust_id'";
							if ($sql = $this->conn->query($query)) {

								echo "<script>alert('records added successfully');</script>";
								echo "<script>window.location.href = '/';</script>";
							} else {
								echo "<script>alert('failed');</script>";
								echo "<script>window.location.href = '/';</script>";
							}
						} else {
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = '/';</script>";
						}
					}
				} else {
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = '/';</script>";
				}
			}
		}
	}



	public function insert_order()
	{
		// var_dump($_POST);
		if (isset($_POST['cart'])) {
			echo "<pre>";

			if (
				isset($_POST['qnty']) &&
				isset($_POST['prod_id'])
				// isset($_SESSION['id'][0])

			) {

				if (
					!empty($_POST['qnty']) &&
					// !empty($_SESSION['id'][0])
					!empty($_POST['prod_id'])
				) {
					foreach ($_POST as $key => $value) {

						filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
					}
					$qnty = $_POST['qnty'];
					$prod_id = $_POST['prod_id'];

					$cust_id = $_SESSION['cust_id'];
					$pro = $_POST['product_pro_id'];
					$cust_id = $_POST['customer_cust_id'];
					$qury = "SELECT * FROM cart WHERE product_pro_id = '$pro' AND customer_cust_id = '$cust_id'";
					// var_dump($pro);
					// var_dump($pro);
					// var_dump($qury);
					// exit;
					if ($sql = $this->conn->query($qury)) {

						echo "<script>alert('Product is already in the cart.');</script>";
					} else {



						$query = "INSERT INTO order (qnty,prod_id,cust_id) 
							VALUES ('$qnty','$prod_id','$cust_id')";
						// var_dump($_POST);
						// var_dump($query);
						// var_dump(

						// mysqli_error_list($this->conn)
						// );
						// exit;
						// var_dump(mysqli_error($this->conn));
						if ($sql = $this->conn->query($query)) {
							// var_dump($sql);
							$query = "DELETE FROM cart where customer_cust_id = '$cust_id'";
							if ($sql = $this->conn->query($query)) {

								echo "<script>alert('records added successfully');</script>";
								echo "<script>window.location.href = '/';</script>";
							} else {
								echo "<script>alert('failed');</script>";
								echo "<script>window.location.href = '/';</script>";
							}
						} else {
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = '/';</script>";
						}
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
	public function carts()
	{
		$data = null;

		$query = "SELECT * FROM cart";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}
	public function fetch_cart_product()
	{
		$data = null;
		$id = $_SESSION['cust_id'];
		$query = "SELECT * FROM cart LEFT JOIN products ON products.Pro_id = cart.product_pro_id
                WHERE customer_cust_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
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
		
		// foreach ($data as $key => $value) {
		// 		// var_dump($value)
		// 	;
		// }
		// var_dump($data);
		return $data;
	}
	public function 	delete_order
	($id)
	{

		$query = "DELETE FROM `order` where product_pro_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}	public function delete($id)
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

	public function edit()
	{

		$data = null;
		$id = $_SESSION['cust_id'];
		// var_dump($id);
		$query = "SELECT * FROM users WHERE cust_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			while ($row = $sql->fetch_assoc()) {
				$data = $row;
			}
		}
		// var_dump($data);
		return $data;
	}

	public function update($data)
	{

		// cust_image = '$data[cust_image]=
		if (isset($_POST['chk'])) {
			# code...
			$id = $_SESSION['cust_id'];
			$query = "UPDATE users SET address='$_POST[address]'
		   WHERE cust_id='$id'";


			if ($sql = $this->conn->query($query)) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function update_cart()
	{
		if (isset($_POST['updateqnty'])) {
			$data = $_POST;
			// var_dump($data);


			// cust_image = '$data[cust_image]=
			$query = "UPDATE cart  SET qnty='$data[qnty]'
			WHERE  
			customer_cust_id ='$data[cust_id]' AND product_pro_id ='$data[prod_id]'";


			if ($sql = $this->conn->query($query)) {
				echo "<script>window.location.href = '/user/customer/carts/cart.php';</script>";
				echo "<script>alert('$data');</script>";

				echo "<script>
				    setTimeout(() => {
        window.reload();
    }, 3);</script>";

				// echo 'woo';

			} else {
				return false;
				// echo 'woo';
			}
			exit;
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
		$pid = $_SESSION['id'][0];

		$query = "SELECT * FROM cart WHERE customer_cust_id = '$pid'";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function check_admin()
	{
		if (!session_id()) {
			session_start();
	}	
		if (!$_SESSION['cust_id']) {
			header('location: /Auth/choose_login.php');
		}
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
