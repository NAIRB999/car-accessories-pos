<?php  


include '../admin/conn.php';

echo "<script>localStorage.setItem('cart_count', 0);</script>";

if(isAuthUser())
{
    header('location:index.php');
}



if(isset($_POST['txtlogin'])){
	$username=$_POST['txtusername'];
	$password=$_POST['txtpassword'];
	$cpass=md5($password);
	$query="SELECT * FROM customer where customer_name='$username' and password='$password'";
	$ch_query=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ch_query);
	$f=mysqli_fetch_array($ch_query);
	if($count>0){
        $_SESSION['auth'] = [ 'name' => $f['customer_name'], 'id' => $f['customer_id']];
		echo "<script> window.alert('Welcome') </script>";
		header('location:index.php');
	}
	else {
		$_SESSION['custname']!=$f['customer_name'];
		$_SESSION['custpass']!=$f['password'];

       echo"<script>window.alert('Login Failed')</script>";
   }
}


?>
<html>
<head>
	<?php
  include 'link.php';
  ?>
  <title>King</title>
</head>
<body>
    <?php
    include 'cnav.php';
    ?>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="txtusername" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Your Name...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="txtpassword" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Enter Your Password" >
                                        </div>
                                        <div >
                                        	<input type="submit" name="txtlogin" value="Sign In" class="btn btn-primary btn-user btn-block"> 
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small mt-3" href="customerregister.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?php 
include 'footer.php'
?>
</body>
</html>