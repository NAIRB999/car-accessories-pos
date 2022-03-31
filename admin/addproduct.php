<?php  

include 'link.php';
include 'conn.php'; 
include 'admin_auth.php';

if (isset($_POST['addprod'])) {
	$proname=$_POST['txtproname'];
	$prosize=$_POST['txtprosize'];
	$price=$_POST['txtprice'];
	$qty=$_POST['txtqty'];
	$desc=$_POST['txtdesc'];
	$brandid=$_POST['txtbrand'];
	$categ=$_POST['txtcat'];
	$img=$_FILES['txtimg']['name'];

	if (is_numeric($price)==false) 
	{
		echo "<script>window.alert('Product Price Should be Numeric')</script>";
	}

	else if (is_numeric($qty)==false)
	 {
		echo "<script>window.alert('Product Quantity Should be Numeric')</script>";
	}
	 else if($proname!="")
	{
		$query="SELECT * from product where product_name='$proname'";
		$ch_query=mysqli_query($connection,$query);
		$count=mysqli_num_rows($ch_query);
		if($count>0){
			echo"<script>window.alert('This Product Already Existed')</script>";
		}
		else{
			 $insert="INSERT INTO product(product_name,size,price,quantity,description,brand_id,category_id,image) VALUE('$proname','$prosize','$price','$qty','$desc','$brandid','$categ','$img')";
	$ret=mysqli_query($connection,$insert);
	}
	if (!$ch_query) {
			die("QUERY FAILED".myqli_error($connection));
		}
		else{
				   echo "<script language=\"javascript\">window.alert('Added Product Successfully')</script>";
				   move_uploaded_file($_FILES['txtimg']['name'],'../images/'.$img);
					   
			   }	
	}
	
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>King</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link
href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
include 'sidebar.php';
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="">

		<!-- Topbar -->
		<?php 
				include 'nav.php';
			?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Welcome <?= $_SESSION['staff_auth']['staff_name'] ?> </h1>
</div>

<div class="card card-login mx-auto mt-6">
	<div class="card-header"><h4>Add Product</h4></div>
	<div class="card-body">
		<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

			<div class="form-group text-primary"> <lable class="control-lable col-md-2">Product Name:</lable>
				<div class="col-md-12">
					<input type="text" name="txtproname" value="" class="form-control" placeholder="Enter Product Name" required />
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Size:</lable>
				<div class="col-md-12">
					<input type="text" name="txtprosize" value="" class="form-control" placeholder="Enter Size"/>
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Price:</lable>
				<div class="col-md-12">
					<input type="text" name="txtprice" value="" class="form-control" placeholder="Enter Price" required />
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Quantity:</lable>
				<div class="col-md-12">
					<input type="text" name="txtqty" value="" class="form-control" placeholder="Enter Quantity" required />
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Description:</lable>
				<div class="col-md-12">
					<input type="textarea" name="txtdesc" value="" class="form-control" placeholder="Enter Description" required />
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Brand:</lable>
				<div class="col-md-12">
					<select name="txtbrand">
						<?php 
						$query="SELECT * FROM brand";
						$ret=mysqli_query($connection,$query);
						$count=mysqli_num_rows($ret);

						for($i=0;$i<$count;$i++) 
		{ 
			$row=mysqli_fetch_array($ret);
			$bid=$row['brand_id'];
			$bname=$row['brand_name'];

			echo "<option value='$bid' >" . $bname . "</option>";
		}
						 ?>
					</select>
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Category:</lable>
				<div class="col-md-12">
					<select name="txtcat">
						<?php 
						$query="SELECT * FROM category";
						$ret=mysqli_query($connection,$query);
						$count=mysqli_num_rows($ret);

						for($i=0;$i<$count;$i++) 
		{ 
			$row=mysqli_fetch_array($ret);
			$cid=$row['category_id'];
			$cname=$row['category_name'];

			echo "<option value='$cid' >" . $cname . "</option>";
		}
						 ?>
					</select>
					<lable class="text-danger"> </label>
					</div>
				</div>

				<div class="form-group text-primary"> <lable class="control-lable col-md-2">Image:</lable>
				<div class="col-md-12">
					<input type="file" name="txtimg" required />
					<lable class="text-danger"> </label>
					</div>
				</div>

				<label class="text-primary"></label>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">

						<button type="submit" class="btn btn-dark" name="addprod">Add Product</button>
					</div>
				</div>

				
										</form>

									</div>
								</div>


							</div>
							<!-- End of Content Wrapper -->

						</div>
						<!-- End of Page Wrapper -->

						<!-- Scroll to Top Button-->
						<a class="scroll-to-top rounded" href="#page-top">
							<i class="fas fa-angle-up"></i>
						</a>

					

					<!-- Bootstrap core JavaScript-->
					<script src="vendor/jquery/jquery.min.js"></script>
					<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

					<!-- Core plugin JavaScript-->
					<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

					<!-- Custom scripts for all pages-->
					<script src="js/sb-admin-2.min.js"></script>

					<!-- Page level plugins -->
					<script src="vendor/chart.js/Chart.min.js"></script>

					<!-- Page level custom scripts -->
					<script src="js/demo/chart-area-demo.js"></script>
					<script src="js/demo/chart-pie-demo.js"></script>

				</body>

				</html>