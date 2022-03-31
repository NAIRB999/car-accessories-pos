<?php

$page = explode('.', (basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])))[0];


function isAuthStaff()
{
	return isset($_SESSION['staff_auth']) ? true : false;
}


if(!isAuthStaff())
{
	header('location:stafflogin.php');
}



class Admin 
{
		
	private $staff;

	function __construct()
	{
		$this->staff = (isset($_SESSION['staff_auth'])) ? $_SESSION['staff_auth'] : [];
	}

	public function Name()
	{
		return $this->staff['staff_name'] ?? 'UNAUTH';
	}

	
}


$admin = new Admin();




