<?php 
include '../admin/conn.php';
$custid = $_SESSION['auth']['id'];
$user = $mysql->query("SELECT * FROM customer where customer_id=".$custid);
$user = $user->fetch_assoc();

$products = $_SESSION['cart'];





?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>King</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

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
    <!-- Page Preloder -->
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
                        <h2>CheckOut</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>CheckOut</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form  id="form" method="post" action="submitorder.php">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>UserName<span>*</span></p>
                                        <input type="text" value="<?= $user['customer_name']?>" name="txtname"readonly >
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" value="<?= $user['address']?>" name="txtadd">
                            </div>
                            <div class="checkout__input">
                                <p>PhoneNo<span>*</span></p>
                                <input type="text" value="<?= $user['phone_no']?>" name="txtph">
                            </div>

                            <div class="">
                                <p>Payment Type<span>*</span></p>
                                <input type="radio" value="mastercard" class="" name="payment"><i class="fa fa-cc-mastercard text-warning ml-2"></i>
                                <input type="radio" value="paypal" class="" name="payment"><i class="fa fa-paypal text-primary ml-2"></i>
                                <input type="radio" value="credit-card" class="" name="payment"><i class="fa fa-credit-card-alt text-success ml-2"></i>
                            </div>
                            <div class="checkout__input">
                                <p>Card No<span>*</span></p>
                                <input type="text" name="txtcard">
                            </div>
                            
                            
                     </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>

                            <ul>
                                <?php 
                                $sub_total_price = 0;
                                foreach ($products as $key => $product) {

                                $query = $mysql->query("SELECT * FROM product where product_id=".$product['product_id']);
                                $data = $query->fetch_assoc();
                                $sub_total_price += $product['count'] * $product['price'];
                                    ?>
                                    <li><?= substr($data['product_name'],0,22).'...'?> <span><?= $product['count'].' X '.$product['price'].' $' ?></span></li>
                               
                                <?php } ?>
                            </ul>
                            <div class="checkout__order__total">Total <span><?= $sub_total_price." "; ?>$</span></div>
                            <button type="submit" onclick="formSubmit()" class="site-btn">PLACE ORDER</button>
                        
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</section>
<!-- Checkout Section End -->

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
    function formSubmit()
    {

        localStorage.setItem('cart_count',0);
        $('#form').submit();

    }
</script>

</html>