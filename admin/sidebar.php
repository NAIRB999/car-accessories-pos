<?php
include 'link.php';
?>
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-tools"></i>
			</div>
			<div class="sidebar-brand-text mx-3">King Car Accessories Admin Panel</div>
		</a>

		<hr class="sidebar-divider d-none d-md-block">

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
			aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-list"></i>
			<span>Brand</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="addbrand.php">Add Brand</a>
				<a class="collapse-item" href="brandlist.php">Brand List</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
		aria-expanded="true" aria-controls="collapseThree">
		<i class="fas fa-fw fa-list"></i>
		<span>Category</span>
	</a>
	<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
			<a class="collapse-item" href="addcategory.php">Add Category</a>
			<a class="collapse-item" href="categorylist.php">Category List</a>
		</div>
	</div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
	<a class="nav-link" href="orderlist.php">
		<i class="fas fa-fw fa-chart-area"></i>
		<span>Orders List</span></a>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link" href="customerlist.php">
			<i class="fas fa-fw fa-users"></i>
			<span>Customer List</span></a>
		</li>
		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link" href="stafflist.php">
				<i class="fas fa-fw fa-users"></i>
				<span>Staff List</span></a>
			</li>
			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
				aria-expanded="true" aria-controls="collapseFour">
				<i class="fas fa-fw fa-wrench"></i>
				<span>Products</span>
			</a>
			<div id="collapseFour" class="collapse" aria-labelledby="headingUtilities"
			data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="addproduct.php">Add Product</a>
				<a class="collapse-item" href="productlist.php">Product List</a>
			</div>
		</div>
	</li>

			

	

</ul>
<!-- End of Sidebar -->

