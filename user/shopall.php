<?php


include '../admin/conn.php';
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

    <?php
    include 'nav1.php';
    ?>
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
    
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Products</h4>
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
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                            </div>
                        </div>
                        <?php

                $result = $mysql->query("SELECT * FROM product ORDER BY product_id");
                $data = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($data as $key => $value) {


    ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="<?= "../admin/images/".$value['image'] ?>">
                                            
                                            <ul class="product__item__pic__hover">
                                                <li><a href="display.php?id=<?= $value['product_id']?>"><i class="fa fa-list"></i></a></li>
                                                
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <h5><a href="#"><?= $value['product_name']?></a></h5>
                                            <div class="product__item__price"><?= $value['price']?>$ </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>
                                    </div>
                                </div>
                                
                               
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                       
                        
                        
                       
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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

</html>