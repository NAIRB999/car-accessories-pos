<?php  

include 'link.php';
include 'conn.php'; 
include 'admin_auth.php';
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

<body>

	
	<!-- Content Wrapper -->
	<?php
	include 'sidebar.php';
	?>
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
	<div class="card-header"><h4>Brand List</h4></div>
	<div class="card-body">
		<div class="col-md-12">
            <table class="table table-hover" style="color:#000">
            <tr style="font-size:17px">
            <th>ID</th>	
            <th>Name</th>
            <th>Action</th>
            </tr>
            <?php
            $query="select * from brand";
            $go_query=mysqli_query($connection,$query);

            while ($row=mysqli_fetch_array($go_query)) {
            	$brandid=$row['brand_id'];
				$brandname=$row['brand_name'];
				echo "<tr>";
				echo "<td>{$brandid}</td>";
				echo "<td>{$brandname}</td>";
				echo "<td><a href='branddelete.php?b_id=$brandid' style='color:red' onclick=\"return confirm('Are you sure?')\">
				X </a> || 
				<a href='brandupdate.php?b_id=$brandid'>Edit</a>
				</td>";
				echo "</tr>";
            }
            ?>
            </table>
            </div>

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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
		<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			<a class="btn btn-primary" href="login.html">Logout</a>
		</div>
	</div>
</div>
</div>

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