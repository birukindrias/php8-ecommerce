





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
				isset($_POST['first_name']) &&
				isset($_POST['last_name'])  && isset($_FILES['cust_image']['name'])
				&& isset($_POST['password']) && isset($_POST['email'])
				&& isset($_POST['address'])
			) {
				if (
					!empty($_POST['first_name']) &&
					!empty($_POST['last_name'])  &&
					!empty($_FILES['cust_image']['name'])
					&& !empty($_POST['password']) && !empty($_POST['email'])
					&& !empty($_POST['address'])
				) {
					$first_name = $_POST['first_name'];
					$last_name = $_POST['last_name'];
					$email = $_POST['email'];
					$address = $_POST['address'];
					$cust_image = $_FILES['cust_image']['name'];
					$password = $_POST['password'];
					$cpass = $_POST['password'];


					// if ($password == $cpass) {


					$sql = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$email}'");
					if (mysqli_num_rows($sql) > 0) {
						echo "$email - This email already exist!";
					} else {
						if (isset($_FILES['cust_image'])) {
							$img_name = $_FILES['cust_image']['name'];
							$img_type = $_FILES['cust_image']['type'];
							$tmp_name = $_FILES['cust_image']['tmp_name'];
							$img_explode = explode('.', $img_name);
							$img_ext = end($img_explode);
							$extensions = ["jpeg", "png", "jpg"];
							// if (in_array($img_ext, $extensions) === true) {
							$types = ["image/jpeg", "image/jpg", "image/png"];
							// if (in_array($img_type, $types) === true) {
							$time = time();
							$new_img_name = $time . $img_name;
							if (move_uploaded_file($tmp_name, "../../../Auth/customer/images/" . $new_img_name)) {
								// $ran_id = rand(time(), 100000000);
								$encrypt_pass = password_hash($password, PASSWORD_DEFAULT);

								$queray = "INSERT INTO users (first_name,last_name,email,address,cust_image,password) 
															VALUES ('$first_name','$last_name','$email','$address','$new_img_name','$password')";

								$insert_query = mysqli_query(
									$this->conn,
									$queray
								);
								if ($insert_query) {
									$select_sql2 = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$email}'");
									if (mysqli_num_rows($select_sql2) > 0) {
										$result = mysqli_fetch_assoc($select_sql2);
										session_start();
										$_SESSION['cust_id'] = $result['cust_id'];
										echo "<script>alert('user added successfully!');</script>";
										echo "<script>window.location.href = 'catagories.php';</script>";
										// var_dump($_SESSION);
									} else {
										echo
										"<script>alert('failed');</script>";
										echo "This email address not Exist!";
									}
								} else {
									echo "Something went wrong. Please try again!";
								}
							}
							// } else {
							// 		echo "Please upload an image file - jpeg, png, jpg";
							// 	}
							// } else {
							// 	echo "Please upload an image file - jpeg, png, jpg";
							// }
						}
					}
					// } else {
					// 	echo "<script>alert('password not match with the confuirm password');</script>";
					// }


				} else {
					echo "<script>alert('invalid input');</script>";
				}
			} else {
				// var_dump($_POST);
				echo "<script>alert('empty');</script>";
				exit;

				echo "<script>window.location.href = '/';</script>";
			}
		}
	}

	public function fetch()
	{
		$data = null;

		$query = "SELECT * FROM users";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function delete($id)
	{

		$query = "DELETE FROM users where cust_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($id)
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
										echo "<script>window.location.href = '/user/customer/index.html';</script>";
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
}
