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
	<div class="card-header d-flex justify-content-between">
		
		<div>
			<h4>Order List</h4>
		</div>

		<div>
			<?php 
				$status = [ 'Pending', 'Canceled', 'Delivered'];
				$target_status = $_GET['order_status'] ?? '';
			?>
			<form id="filter_form_by_status" method="get">
				<select class="form-control" name="order_status" id="filter_order_status"> 
					<option value="">All</option>
					<?php foreach ($status as $s) {  $selected = ($target_status == strtoupper($s)) ? 'selected' : '' ?>
						<option value="<?= strtoupper($s) ?>" <?= $selected ?>><?= $s ?></option>
					<?php } ?>
				</select>
			</form>
		</div>

	</div>
	<div class="card-body">
		<div class="col-md-12">
            <table class="table table-bordered" style="color:#000">
            <tr style="font-size:17px">
            <th>No</th>
            <th>Customer Name</th>
            <th>Phone No</th>	
            <th>Product Name</th>
            <th>Order Date</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            <?php
            
            $order_status = $_GET['order_status']  ?? 'ALL';
            $status = '';

            switch ($order_status) {
				        	case 'PENDING':
				        		$status = 0;
				        		break;
								
								case 'DELIVERED':
				        		$status = 1;
				        		break;

								case 'CANCELED':
				        		$status = 2;
				        		break;

				        	
				        	default:
				        		$status = '0,1,2';
				        		break;
				        }

            $query="select order_detail.*, orders.*, product.*, customer.* FROM order_detail INNER JOIN orders ON orders.order_id = order_detail.order_id INNER JOIN product ON product.product_id=order_detail.product_id INNER JOIN customer ON customer.customer_id = orders.customer_id WHERE status in (".$status.")";
            
            
            $query=mysqli_query($connection,$query);

            // echo "<pre>".var_export($query)."</pre>";

            $row=mysqli_fetch_all($query,MYSQLI_ASSOC);

            // echo "<pre>".var_export($row)."</pre>";


            $data = [];

            foreach($row as $r)
            {

            	$data[$r['order_id']]['order'] =  ['order_id' => $r['order_id'], 'order_date' => $r['order_date'],'total_amount' => $r['total_amount'],'total_quantity' => $r['total_quantity'],'address' => $r['address'],'deliver_phone' => $r['deliver_phone'],'customer_id' => $r['customer_id'],'customer_name' => $r['customer_name'],'status' => $r['status']];
            	
            }

            foreach($row as $key => $r)
            {
            	$data[$r['order_id']]['order']['products'][$key++] = $r['product_name'];
            }

            


            // echo "<pre>".var_export($data,true)."</pre>";
            $i = 1;
            foreach ($data as $key => $order) { $order = $order['order']; ?>

           
				<tr >
					<td><?= $i++.' .' ?></td>
					<td><?= $order['customer_name'] ?></td>
					<td><?= $order['deliver_phone'] ?></td>
					<td><?= implode('<br/>',$order['products']) ?></td>
					<td class="text-danger"><?= date( 'd-m-Y', strtotime($order['order_date'])) ?></td>
					<td><?= $order['address'] ?></td>
					
					<td><?= $order['total_quantity'] ?></td>
					<td><?= $order['total_amount'] ?></td>
					<td>
						<?php if(!$order['status']) { ?>
							<span class="bg-warning opacity-75 px-1 rounded-lg text-white">In Progress</span>
						<?php } elseif($order['status'] == 1) { ?>
							<span class="bg-success opacity-75 px-1 rounded-lg text-white">It's Delivered.</span>
						<?php } else {?>
							<span class="bg-danger opacity-75 px-1 rounded-lg text-white">Canceled Order.</span>
						<?php } ?>
					</td>
					<td class="text-center">
						<?php if($order['status'] == 0) { ?>	
								<div class="d-flex flex-column">
								<button type="button" onclick="setOrderID(<?= $order['order_id'] ?>)" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
								  Make as Deliver
								</button>
								<a href='cancelorder.php?order_id=<?=$order['order_id'] ?>' class="btn-danger mt-2 btn-sm btn text-white">Cancel Order</a>
							</div>
						<?php } else { echo "-";}?>
					</td>
				</tr>

           <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose Delivery Staff</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form action="makedeliver.php" method="get" id='choose_staff_form'>
	      	<input type="hidden" name="order_id" id="order_id">
	      	<div class="form-group">
	      		<label class="control-lable">Choose Delivery Date</label>
	      		<input type="date" id="delivery_date" name="delivery_date" class="form-control" min="">
	      	</div>

	      	<div class="form-group">
	      		<label class="control-lable">Choose Delivery Staff</label>
		      	<select class="form-control" name="staff_id">
		      		
		      	<?php 

		      		$query = $mysql->query('SELECT * from staff');
		      		$staffs = $query->fetch_all(MYSQLI_ASSOC);

		      		foreach($staffs as $staff)
		      		{
				?>

					<option value="<?= $staff['staff_id']?>"><?= $staff['staff_name'] ?></option>
				<?php } ?>
		      	</select>
	      	</div>
	      </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="submitChooseStaffFrom()"  id="choose_staff_form_button" class="btn btn-primary">Choose</button>
      </div>
    </div>
  </div>
</div>

<div class="w-100 bg-dark position-absolute opacity-75" style="z-index: 1; height: 200%;" id="loading">
	<div class="spinner-grow position-relative" role="status" style="z-index: 3; left: 900; margin-top: 400px;">
	  <span class="sr-only">Loading...</span>
	</div>
</div>




</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript">

	$('#loading').hide();
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();

	if (dd < 10) {
	   dd = '0' + dd;
	}

	if (mm < 10) {
	   mm = '0' + mm;
	} 
	    
	today = yyyy + '-' + mm + '-' + dd;
		
	$('#delivery_date').val(today)
	$('#delivery_date').attr('min',today)


	function setOrderID(id)
	{
		$('#order_id').val(id);
	}

	function submitChooseStaffFrom()
	{

		$('#exampleModal').modal('hide')
		setTimeout(() => {
			$('#loading').show();
		},4000)

		setInterval(()=>{
			$("#choose_staff_form").submit();
			$('#loading').hide();
		},4000)

	}

	$('#filter_order_status').on('change',function(){
			$('#filter_form_by_status').submit();
	})

</script>
</html>