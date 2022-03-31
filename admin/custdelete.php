<?php
include('conn.php');

$cusid=$_GET['cus_id'];

$query="DELETE FROM customer WHERE customer_id='$cusid' ";
$ret=mysqli_query($connection,$query);

echo "<script>location.href = ('customerlist.php')</script>";

?>
