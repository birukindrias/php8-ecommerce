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
			$fname = mysqli_real_escape_string($this->conn, $_POST['first_name']);
			$lname = mysqli_real_escape_string($this->conn, $_POST['Last_name']);
			$email = mysqli_real_escape_string($this->conn, $_POST['admin_email']);
			$password = mysqli_real_escape_string($this->conn, $_POST['admin_pass']);
			$address = mysqli_real_escape_string($this->conn, $_POST['admin_address']);
			$cpass = mysqli_real_escape_string($this->conn, $_POST['cpass']);

			if (
				isset($_POST['first_name']) &&
				!empty($_POST['cpass'])  &&
				isset($_POST['Last_name'])
				&& isset($_POST['admin_pass']) && isset($_POST['admin_email'])
				&& isset($_POST['admin_address'])
			) {

				if (
					!empty($_POST['first_name']) &&
					!empty($_POST['Last_name'])  &&
					!empty($_POST['admin_pass'])
					&& !empty($_POST['admin_email'])
					&& !empty($_POST['admin_address'])
				) {



					if (filter_var($email, FILTER_VALIDATE_EMAIL) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS) &&  filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($lname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS)) {
						$sql = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");

						if ($password == $cpass) {


							if (mysqli_num_rows($sql) > 0) {
								echo "$email - This email already exist!";
							} else {

								$encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
								// $encrypt_pass = $password;
								$Mngr_id = 1;
								$insert_query = mysqli_query($this->conn, "INSERT INTO admin (first_name,last_name,email,address,password,Mngr_id)
                                VALUES ('{$fname}','{$lname}', '{$email}', '{$address}', '{$encrypt_pass}','$Mngr_id')");
								if ($insert_query) {
									$select_sql2 = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");
									if (mysqli_num_rows($select_sql2) > 0) {
										$result = mysqli_fetch_assoc($select_sql2);
										session_start();
										$_SESSION['admin_id'] = $result['admin_id'];
										echo "<script>alert('SignUp is sucessfully');</script>";
										echo "<script>window.location.href = '/user/Admin/index.php';</script>";
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
						} else {
							echo "<script>alert('password not match with the confuirm password');</script>";
						}
					} else {
						echo "$email is not a valid email!";
					}
				} else {
					echo "<script>alert('invalid input');</script>";
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

		$query = "SELECT * FROM records";
		if ($sql = $this->conn->query($query)) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function delete($id)
	{

		// var_dump($id);
		// exit;
		$query = "DELETE FROM admins where admin_id = '$id'";
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
			$email = mysqli_real_escape_string($this->conn, $_POST['email']);
			$password = mysqli_real_escape_string($this->conn, $_POST['password']);

			if (isset($_POST['password']) && isset($_POST['email'])) {
				if (
					!empty($_POST['password']) && !empty($_POST['email'])
				) {


					$data = null;

					echo "<pre>";
					// $query = "SELECT * FROM admin WHERE email = '$email'";

					$sql = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");
					// var_dump($sql);


					if (mysqli_num_rows($sql) > 0) {

						$row = mysqli_fetch_assoc($sql);


						if (password_verify($_POST['password'], $row['password'])) {
							# code...

							session_start();
							$_SESSION['admin_id'] = $row['admin_id'];
							var_dump($_SESSION);
							echo "<script>alert('records is wright successfully');</script>";
							echo "<script>window.location.href = '/user/Admin/index.php';</script>";
							// }
						} else {
							echo "<script>alert('Password Deas not match');</script>";
						}
					} else {
						echo "<script>alert('$email - This email not Exist!');</script>";
					}
				} else {
					echo "<script>alert('invalid input');</script>";
				}
			} else {
				echo "<script>alert('empty');</script>";
				echo "<script>window.location.href = 'index.php';</script>";
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
}
