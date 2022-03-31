<?php
	
	include './conn.php';

	$order_id = $_GET['order_id'];
	$staff_id = $_GET['staff_id'];
	$delivery_date = $_GET['delivery_date'];


	$query = $mysql->query('UPDATE orders SET status = 1 WHERE order_id = '.$order_id);

	$query = $mysql->query("INSERT INTO `delivery` (`order_id`, `delivery_date`, `staff_id`) VALUES ('$order_id','$delivery_date','$staff_id')");


	header('location:orderlist.php');
