<?php

class Mnger_Model
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

	public function set($key, $value)
	{
		session_start();
		if (!$_SESSION[$key]) {
			$_SESSION[$key][] = $value;
		}
	}
	public function check_mngr()
	{
		session_start();
		if (!$_SESSION['mngr_id']) {
			header('location: /Auth/customer/login.php');
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
				isset($_POST['Last_name'])
				&& isset($_POST['mngr_pass']) &&
				isset($_POST['mngr_email'])
				&& isset($_POST['mngr_address'])
			) {

				if (
					!empty($_POST['first_name']) &&
					!empty($_POST['Last_name'])
					&& !empty($_POST['mngr_pass']) && !empty($_POST['mngr_email'])
					&& !empty($_POST['mngr_address'])
				) {
					foreach ($_POST as $key => $value) {

						if (filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {
							$first_name = $_POST['first_name'];
							$last_name = $_POST['Last_name'];
							$email = $_POST['mngr_email'];
							$address = $_POST['mngr_address'];
							$mngr_pass = $_POST['mngr_pass'];

							$query = "INSERT INTO manager (first_name,Last_name,mngr_email,mngr_address,mngr_pass) 
							VALUES ('$first_name','$last_name','$email','$address','$mngr_pass')";
							if ($sql = $this->conn->query($query)) {
								echo "<script>alert('records added successfully');</script>";
								echo "<script>window.location.href = 'index.php';</script>";
							} else {
								echo "<script>alert('failed');</script>";
								echo "<script>window.location.href = 'index.php';</script>";
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
			if (isset($_POST['mngr_pass']) && isset($_POST['mngr_email'])) {

				if (
					!empty($_POST['mngr_pass']) && !empty($_POST['mngr_email'])
				) {
					foreach ($_POST as $key => $value) {

						if (filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS)) {

							$mngr_email = $_POST['mngr_email'];
							$mngr_pass = $_POST['mngr_pass'];

							$data = null;

							$query = "SELECT * FROM users WHERE mngr_email = '$mngr_email' && mngr_pass = '$mngr_pass'";

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

		  mngr_pass='$data[mngr_pass]'
		   WHERE cust_id='$data[id] '";


		if ($sql = $this->conn->query($query)) {
			return true;
		} else {
			return false;
		}
	}
}
