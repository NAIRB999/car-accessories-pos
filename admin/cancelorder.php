<?php

	
	include './conn.php';

	$order_id = $_GET['order_id'];

	$query = $mysql->query('UPDATE orders SET status = 2 WHERE order_id = '.$order_id);

	header('location:orderlist.php');