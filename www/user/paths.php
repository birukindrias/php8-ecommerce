<?php

class path
{

	


	public function __construct()
	{
		if ($_SESSION['cust_id']) {
			header('location: /user/Admin/index.html');
		}
	}

}
