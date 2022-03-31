<?php 
include '../admin/conn.php';


$custname=$_POST['txtname'];
$address=$_POST['txtadd'];
$phone=$_POST['txtph'];
$payment=$_POST['payment'];
$cart_products =$_SESSION['cart'];
$custid=$_SESSION['auth']['id'];

$total_price = 0;
$total_qty = 0;

foreach ($cart_products as $key => $value) {
	$total_price += $value['price'] * $value['count'];
	$total_qty += $value['count'];
}

$today = date(DATE_RFC822);

$query = $mysql->query("INSERT INTO `orders`( `total_amount`, `total_quantity`, `address`, `deliver_phone`, `customer_id`, `customer_name`) VALUES ('$total_price','$total_qty','$address','$phone','$custid','$custname')");


$query = $mysql->query("SELECT * FROM `orders` ORDER BY order_id DESC LIMIT 1");
$order =$query->fetch_assoc();

echo $order['order_id'];

foreach ($cart_products as $key => $value) {
	
$query = $mysql->query("INSERT INTO `order_detail`(`order_id`, `product_id`, `price`, `quantity`) VALUES ('{$order['order_id']}','{$value['product_id']}','{$value['price']}','{$value['count']}')");
}

$query1=$mysql->query("insert into payment (payment_type,total_amount) value ('{$payment}','{$total_price}')");

unset($_SESSION['cart']);

$_SESSION['sucess_payment'] = ['message' => 'Your Order Successfully Submited.']; 


header("location:index.php"); 

?>