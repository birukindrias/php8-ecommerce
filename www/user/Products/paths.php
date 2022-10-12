<?php

class path
{

	


	public function __construct()
	{
		if ($_SESSION['admin_id']) {
			header('location: /user/Admin/index.html');
		}
		if ($_SESSION['cust_id']) {
			header('location: /user/customer/index.html');
		}
		if (!$_SESSION['mngr_id']) {
			header('location: /');
		}
	}

}
