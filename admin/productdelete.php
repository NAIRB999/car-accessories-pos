<?php
include('conn.php');

$pid=$_GET['p_id'];

$query="DELETE FROM product WHERE product_id='$pid' ";
$ret=mysqli_query($connection,$query);

echo "<script>location.href = ('productlist.php')</script>";

?>
