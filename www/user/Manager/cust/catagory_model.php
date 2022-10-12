





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
			$fname = mysqli_real_escape_string($this->conn, $_POST['first_name']);
			$lname = mysqli_real_escape_string($this->conn, $_POST['last_name']);
			$email = mysqli_real_escape_string($this->conn, $_POST['email']);
			$password = mysqli_real_escape_string($this->conn, $_POST['password']);
			$address = mysqli_real_escape_string($this->conn, $_POST['address']);

			if (
				isset($_POST['first_name']) &&
				isset($_POST['last_name'])
				&& isset($_POST['password']) && isset($_POST['email'])
				&& isset($_POST['address'])
			) {

				if (
					!empty($_POST['first_name']) &&
					!empty($_POST['last_name'])  &&
					!empty($_POST['password'])
					&& !empty($_POST['email'])
					&& !empty($_POST['address'])
				) {
					if (filter_var($email, FILTER_VALIDATE_EMAIL) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS) &&  filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($lname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS)) {
						$sql = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");
						if (mysqli_num_rows($sql) > 0) {
							echo "$email - This email already exist!";
						} else {
							// $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
							$encrypt_pass = $password;
							session_start();
							$Mngr_id = $_SESSION['mngr_id'];

							$insert_query = mysqli_query($this->conn, "INSERT INTO admin (first_name,last_name,email,address,password,Mngr_id)
                                VALUES ('{$fname}','{$lname}', '{$email}', '{$address}', '{$encrypt_pass}','$Mngr_id')");
							if ($insert_query) {
								$select_sql2 = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");
								if (mysqli_num_rows($select_sql2) > 0) {
									$result = mysqli_fetch_assoc($select_sql2);
									session_start();
									$_SESSION['admin_id'] = $result['admin_id'];
									echo "<script>alert('Admin created successfully');</script>";
									echo "<script>window.location.href = 'catagories.php';</script>";
								} else {
									echo
									"<script>alert('failed');</script>";

									echo "This email address not Exist!";
								}
							} else {
								echo "Something went wrong. Please try again!";
							}
						}
					} else {
						echo "$email is not a valid email!";
					}
				} else {
					echo "<script>alert('All inputs must be filled');</script>";
				}
			} else {
				// var_dump($_POST);
				echo "<script>alert('empty');</script>";

				// echo "<script>window.location.href = '/';</script>";
			}
		}
	}

	public function fetch()
	{
		$data = null;

		$query = "SELECT * FROM admin";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function delete($id)
	{

		$query = "DELETE FROM admin where admin_id = '$id'";
		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function fetch_single($id)
	{

		$data = null;

		$query = "SELECT * FROM admin WHERE admin_id = '$id'";
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

							$query = "SELECT * FROM admin WHERE email = '$email' && password = '$password'";

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

		$query = "SELECT * FROM admin WHERE admin_id = '$id'";
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
		$query = "UPDATE admin SET 
		last_name='$data[last_name]',
		first_name='$data[first_name]', 
		email='$data[email]',
		  address='$data[address]',
		  password='$data[password]'
		   WHERE admin_id='$data[id] '";


		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}
