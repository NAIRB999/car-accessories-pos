<?php 
	
	include '../admin/conn.php';


    $cart_data = $_SESSION['cart'] ?? [];



	


	$cart_products = [];

	foreach ($cart_data as $key => $item) {
		// echo $item['product_id'];
        $result = $mysql->query("SELECT * FROM product where product_id = ".$item['product_id']);
        $data = $result->fetch_assoc();

		$cart_products[$item['product_id']]  = $data;
	}


	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>King</title>
<!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <?php
    include 'nav1.php';
    ?>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categories</span>
                        </div>
                        <ul>
                            <li><a href="products.php?c_id=5">Engine Oil</a></li>
                            <li><a href="products.php?c_id=6">Steering Wheel Cover</a></li>
                            <li><a href="products.php?c_id=7">Leather Car Seat</a></li>
                            <li><a href="products.php?c_id=8">Keys Chains</a></li>
                            <li><a href="products.php?c_id=9">Air Filter</a></li>
                            <li><a href="products.php?c_id=10">Carbody Cover</a></li>
                            <li><a href="products.php?c_id=11">Car Mats</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                
                                <input type="text" placeholder="Type To Search">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" >
        <div class="container badge-success">
            <div class="row">
                <div class="col-lg-12 text-center badge-dark">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            	
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            
                            </thead>
                            <tbody>
                            	<?php $i = 1; foreach($cart_products as $key => $product){ ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?= "../admin/images/".$product['image'] ?>" width="100px" height="50px" alt="">
                                        <h5><?= $product['product_name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">$
                                        <?= $product['price'] ?>
                                    </td>
                                    <td class="shoping__cart__quantity d-flex">
                                        <div class="quantity mx-auto pl-md-5">
                                            <div class="my-pro-qty d-flex">
                                                <div class="d-flex">
                                                    <form action="./addtocart.php" method="get">
                                                        <input type="hidden" name="decrease">
                                                        <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                                                        <button type="submit" class="btn qtybtn">-</button>
                                                    </form>
                                                </div>
                                                <input type="text" id='display_count' name='qty' value="<?= $cart_data[$product['product_id']]['count'] ?>">
                                                <div class="d-flex">
                                                    <form action="./addtocart.php" method="get">
                                                        <input type="hidden" name="increase">
                                                        <input type="hidden" name="page" value="cart">
                                                        <input type="hidden" name="product_count" value="1">
                                                        <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                                                        <button type="submit" class="btn qtybtn">+</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">$
                                        <?= $cart_data[$product['product_id']]['count'] * $product['price'] ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <form method="get" action="./addtocart.php">
                                            <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                                            <input type="hidden" name="remove">
                                            <button type="submit" class="btn"><span class="icon_close"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="shopall.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="checkout.php" class="primary-btn cart-btn cart-btn-right"><span ></span>
                            Submit Order</a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php 
    include 'footer.php';
    ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
	
</body>

<script type="text/javascript">
    
        $(document).ready(()=> {
            var proQty = $('.my-pro-qty');
            // proQty.prepend('<span class="dec btn qtybtn">-</span>');
            // proQty.append('<span class="inc btn qtybtn">+</span>');
           
           
        })


</script>
</html>
