<?php
include('conn.php');

$staffid=$_GET['s_id'];

$query="DELETE FROM staff WHERE staff_id='$staffid' ";
$ret=mysqli_query($connection,$query);

echo "<script>location.href = ('stafflist.php')</script>";

?>
