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
			$lname = mysqli_real_escape_string($this->conn, $_POST['last_name']);
			$email = mysqli_real_escape_string($this->conn, $_POST['email']);
			$password = mysqli_real_escape_string($this->conn, $_POST['password']);
			$cpass = mysqli_real_escape_string($this->conn, $_POST['cpass']);
			$address = mysqli_real_escape_string($this->conn, $_POST['address']);
			if (
				$fname &&
				isset($cpass) &&
				$lname
				&& isset($password) && isset($email)
				&& isset($address)
			) {
				if (
					!empty($fname) &&
					!empty($lname)  &&
					!empty($cpass)  &&
					!empty($_FILES['cust_image']['name'])
					&& !empty($password)
					&& !empty($email)
					&& !empty($address)
				) {
					if (
						filter_var($email, FILTER_VALIDATE_EMAIL) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS) &&
						filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS) &&  filter_var($fname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($lname, FILTER_SANITIZE_SPECIAL_CHARS)  && filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS)
					) {
						if ($password == $cpass) {


							$sql = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$email}'");

							if (mysqli_num_rows($sql) > 0) {
								echo "$email - This email already exist!";
							} else {
								if (isset($_FILES['cust_image'])) {
									$img_name = $_FILES['cust_image']['name'];
									$img_type = $_FILES['cust_image']['type'];
									$tmp_name = $_FILES['cust_image']['tmp_name'];
									$time = time();
									$new_img_name = $time . $img_name;
									if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
										$ran_id = rand(time(), 100000000);
										$encrypt_pass = password_hash($password, PASSWORD_DEFAULT);
										$insert_query = mysqli_query(
											$this->conn,
											"INSERT INTO users (first_name,last_name,email,address,cust_image,password)
                                            VALUES ('{$fname}','{$lname}', '{$email}', '{$address}', 
											'{$new_img_name}', '{$encrypt_pass}')"
										);
										if ($insert_query) {
											$select_sql2 = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$email}'");
											if (mysqli_num_rows($select_sql2) > 0) {
												$result = mysqli_fetch_assoc($select_sql2);
												session_start();
												$_SESSION['cust_id'] = $result['cust_id'];
												echo "<script>alert('you successfully signup, thank you');</script>";
												echo "<script>window.location.href = '/user/customer/index.php';</script>";
											} else {
												echo
												"<script>alert('This email address not Exist!');</script>";
											}
										} else {
											echo "Something went wrong. Please try again!";
										}
									}
								}
							}
						} else {
							echo "<script>alert('password not match with the confuirm password');</script>";
						}
					} else {

						echo "<script>alert('$email is not a valid email!')</script>";
					}
				} else {
					echo "<script>alert('Please fill all the Inputs');</script>";
				}
			} else {
				echo "<script>alert('Please fill all the Inputs');</script>";
				echo "<script>window.location.href = '/';</script>";
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

			if (isset($password) && isset($email)) {
				if (
					!empty($password) && !empty($email)
				) {


					$data = null;

					// echo "<pre>";
					$query = "SELECT * FROM users WHERE email = '$email'";
					$sql = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '{$email}'");
					if (mysqli_num_rows($sql) > 0) {
						$row = mysqli_fetch_assoc($sql);

						if (
							password_verify($password, $row['password'])

						) {
							if (!session_id()) {
								session_start();
							}
							$_SESSION['cust_id'] = $row['cust_id'];
							echo "<script>alert('Welcome Back!');</script>";
							echo "<script>window.location.href = '/user/customer/index.php';</script>";
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
}
