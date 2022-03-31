<?php

include '../admin/conn.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    
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
    <?php 
    include 'nav1.php';
    ?>
    <section class="hero">
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
                            <form action="products.php" method="get">
                                
                                <input type="text" name="name" placeholder="Search by product name">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        
                    </div>
                    <div class="hero__item set-bg" data-setbg="images/2.jpg">
                        <div class="hero__text">
                            <span></span>
                            <br>
                            <h2>Engine Oil</h2>
                            <p>Pickup and Delivery Available</p>
                            <a href="products.php?c_id=5" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/e1.jpg"> 
                            <h5><a href="products.php?c_id=5">Engine Oil</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/k1.jpg">
                            <h5><a href="products.php?c_id=8">Key Chains</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/s1.jpg">
                            <h5><a href="products.php?c_id=6">Steering Covers</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/ls1.jpg">
                            <h5><a href="products.php?c_id=7">Seat Covers</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/cm1.jpg">
                            <h5><a href="products.php?c_id=11">Car Mats</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/af1.jpg">
                            <h5><a href="products.php?c_id=9">Air Filter</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="images/cbc1.jpg">
                            <h5><a href="products.php?c_id=10">Car Cover</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Recommended Product</h2>
                    </div>
                    
                </div>
            </div>
        <div class="row featured__filter">

                <?php

                $result = $mysql->query("SELECT * FROM product ORDER BY product_id DESC  limit 8");
                $data = $result->fetch_all(MYSQLI_ASSOC);
                

    foreach ($data as $key => $value) {


    ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mix">
            <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="<?= "../admin/images/".$value['image'] ?>">
                    <ul class="featured__item__pic__hover">
                        <li><a href="display.php?id=<?= $value['product_id'] ?>"><i class="fa fa-list"></i></a></li>
                        <?php if(isAuthUser()) { ?>
                            <li><a href="addtocart.php?increase=&id=<?= $value['product_id'] ?>&price=<?= $value['price']?>"><i class="fa fa-shopping-cart" name></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="featured__item__text">
                    <h6><?= $value['product_name']?></h6>
                    <h5>    </h5>
                </div>
            </div>
        </div>

    <?php } ?>
        </div>

        <?php if(isset($_SESSION['sucess_payment'])) {
                
        ?>
    <div class="w-50 text-center mx-auto fixed-bottom success_box">
        <div class="alert alert-success"><?= $_SESSION['sucess_payment']['message'] ?></div>
    </div>
<?php unset($_SESSION['sucess_payment']);  } ?>
        
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    
    <br>
    <!-- Banner End -->

    

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

<?php

include 'footer.php';
?>

</body>
<script type="text/javascript">
if($('.success_box'))
{
    setTimeout(()=>{
        $('.success_box').hide();
    },3000)   
}
</script>
</html>