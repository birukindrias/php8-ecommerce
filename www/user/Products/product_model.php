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

		$query = "DELETE FROM records where id = '$id'";
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
}
