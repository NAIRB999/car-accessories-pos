<?php 
session_start();
unset($_SESSION['staff_auth']);
	
	header("location:stafflogin.php");

 ?>