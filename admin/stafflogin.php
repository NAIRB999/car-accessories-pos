<?php  
include 'conn.php'; 
if(isset($_POST['txtlogin'])){
	$staffname=$_POST['txtstaffname'];
	$password=$_POST['txtpassword'];
	$cpass=md5($password);
	$query="SELECT * FROM staff where staff_name='$staffname' and password='$password'";
	$ch_query=mysqli_query($connection,$query);
	$count=mysqli_num_rows($ch_query);
	$f=mysqli_fetch_array($ch_query);
	if($count>0){
        $_SESSION['staff_auth'] = [ 'staff_id' => $f['staff_id'], 'staff_name' => $f['staff_name']];
		echo "<script> window.alert('Welcome') </script>";
		header('location:dashboard.php');
	}
	else {
		$_SESSION['stfname']!=$f['staff_name'];
		$_SESSION['stfpass']!=$f['password'];
	  
		header('location:stafflogin.php');
        echo "<script> window.alert('Sign In Failed') </script>";
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
	<div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" name="txtstaffname" class="form-control form-control-user"
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
                                        <a class="small mt-3" href="customerregister.php">Register New Staff!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
</html>