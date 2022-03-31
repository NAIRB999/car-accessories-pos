<?php
	
	session_start();
	
	if(isset($_SESSION['cart']))
	{
		unset($_SESSION['cart']);
	}

	unset($_SESSION['auth']);
	
	header("location:customerlogin.php");


?>