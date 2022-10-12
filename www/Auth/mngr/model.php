<?php

class Model
{

	private $server = "localhost";
	private $username = "root";
	private $mngr_pass = "root";
	private $db = "ecome";
	private $conn;


	public function __construct()
	{
		try {

			$this->conn = new mysqli($this->server, $this->username, $this->mngr_pass, $this->db);
		} catch (Exception $e) {
			echo "connection failed" . $e->getMessage();
		}
	}



	public function insert()
	{

		if (isset($_POST['submit'])) {
			// echo "<pre>";
			$fname = mysqli_real_escape_string($this->conn, $_POST['first_name']);
			$lname = mysqli_real_escape_string($this->conn, $_POST['last_name']);
			$email = mysqli_real_escape_string($this->conn, $_POST['email']);
			$password = mysqli_real_escape_string($this->conn, $_POST['password']);
			$address = mysqli_real_escape_string($this->conn, $_POST['address']);
			$cpass = mysqli_real_escape_string($this->conn, $_POST['cpass']);

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
						if ($password == $cpass) {

							$sql = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");

							if (mysqli_num_rows($sql) > 0) {
								echo "$email - This email already exist!";
							} else {

								// $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
								$encrypt_pass = $password;
								$Mngr_id = 1;
								$insert_query = mysqli_query($this->conn, "INSERT INTO manager (first_name,last_name,email,address,password)
                                VALUES ('{$fname}','{$lname}', '{$email}', '{$address}', '{$encrypt_pass}')");
								if ($insert_query) {
									$select_sql2 = mysqli_query($this->conn, "SELECT * FROM manager WHERE email = '{$email}'");
									if (mysqli_num_rows($select_sql2) > 0) {
										$result = mysqli_fetch_assoc($select_sql2);
										session_start();
										$_SESSION['mngr_id'] = $result['mngr_id'];
										echo "<script>alert('you successfully signup, thank you');</script>";
										echo "<script>window.location.href = '/user/Manager/index.php';</script>";
									} else {
										echo
										"<script>alert('This email address not Exist!');</script>";
									}
								} else {
									echo "Something went wrong. Please try again!";
								}
							}
						} else {
							echo "<script>alert('password not match with the confuirm password');</script>";
						}
					} else {
						echo "<script>alert('$email is not a valid email!');</script>";
					}
				} else {
					echo "<script>alert('invalid input');</script>";
				}
			} else {
				echo "<script>alert('empty');</script>";

				// echo "<script>window.location.href = '/';</script>";
			}
		}
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
					$sql = mysqli_query($this->conn, "SELECT * FROM admin WHERE email = '{$email}'");
					if (mysqli_num_rows($sql) > 0) {
						$row = mysqli_fetch_assoc($sql);
						session_start();
						$_SESSION['mngr_id'] = $row['mngr_id'];
						echo "<script>alert('welcome back!');</script>";
						echo "<script>window.location.href = '/user/Manager/index.php';</script>";
						// }
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
}
