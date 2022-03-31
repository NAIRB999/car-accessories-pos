<?php
include 'conn.php'; 

if (isset($_POST['register'])) {
  $staffname=$_POST['txtstaffname'];
  $password=$_POST['txtpassword'];
  $confirmpass=$_POST['txtconfirmpassword'];
  $email=$_POST['txtemail'];
  $phone=$_POST['txtphone'];
  $address=$_POST['txtaddress'];
  if($password!=$confirmpass){
    echo "<script>window.alert('Try Again Password Are Not Same')</script>";
  }
  elseif ($password!="" && $staffname!="")
  {
    $query="select * from staff where staff_name='$staffname' and password='$password'";
    $ch_query=mysqli_query($connection,$query);
    $count=mysqli_num_rows($ch_query);
    if($count>0){
      echo"<script>window.alert('This Staff Already Exist')</script>";
    }
    else{
      $insert="INSERT INTO staff(staff_name,email,password,address,phone_no)
  VALUE('$staffname','$email','$password','$address','$phone')";
  $ret=mysqli_query($connection,$insert);
  if($ret)
  {
    echo "<script>window.alert('Staff Sign UP Successfully')
        window.location='Customerlogin.php';
    </script>"  ;
  }

    }
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
<body >
	<div class="text-center" style="margin-top:1em" >
		<h3>Welcome</h3>
	</div>
	<div class="container" style="margin-top:1em">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header"><h4>Registeration</h4></div>
			<div class="card-body">
				<form action="" method="post" class="form-horizontal">

					<div class="form-group text-primary"> <lable class="control-lable col-md-2">Name:</lable>
						<div class="col-md-10">
							<input type="text" name="txtstaffname" value="" class="form-control" id="username" placeholder="Enter Your Name" required />
							<lable class="text-danger"> </label>
							</div>
						</div>



						<div class="form-group text-primary"> <lable class="control-lable col-md-2">Password:</lable>
							<div class="col-md-10">
								<input type="password" name="txtpassword" value="" class="form-control" id="password" placeholder="Enter Password" required/>
								<lable class="text-danger"> </label>
								</div>
							</div>



							<div class="form-group text-primary"> <lable class="control-lable col-md-2">Confirm Password:</lable>
								<div class="col-md-10">
									<input type="password" name="txtconfirmpassword" value="" class="form-control" id="confirmpassword" placeholder="Enter Password Again" required />
									<lable class="text-danger"> </label>
										<lable class="text-danger"> </label>
										</div>
									</div>



									<div class="form-group text-primary"> <lable class="control-lable col-md-2">Email:</lable>
										<div class="col-md-10">
											<input type="email" name="txtemail" value=" " class="form-control" id="email" placeholder="Enter Your Email" required/>
											<lable class="text-danger"> </label>
											</div>
										</div>



										<div class="form-group text-primary"> <lable class="control-lable col-md-2">Phone:</lable>
											<div class="col-md-10">
												<input type="text" name="txtphone" value="" class="form-control" id="phone" placeholder="Enter Your Phone Number" required/>
												<lable class="text-danger"> </label>
												</div>
											</div>



											<div class="form-group text-primary"> <lable class="control-lable col-md-2">Address:</lable>
												<div class="col-md-10">
													<textarea name="txtaddress" value="" class="form-control"  placeholder="Your Current Address" required/></textarea>
													<lable class="text-danger"> </label>
													</div>
												</div>

												<label class="text-primary"></label>
												<div class="form-group">
													<div class="col-md-offset-2 col-md-10">
														<Br>
														<button type="submit" class="btn btn-dark" name="register">Sign Up</button>
														<div class="text-left" style="float: right;">
															<button type="reset" class="btn btn-dark">Back</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</body>
							</html>