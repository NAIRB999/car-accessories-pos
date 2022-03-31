<?php
include('conn.php');

$brandid=$_GET['b_id'];

$query="DELETE FROM brand WHERE brand_id='$brandid' ";
$ret=mysqli_query($connection,$query);

echo "<script>location.href = ('brandlist.php')</script>";

?>
