<?php

include '../admin/conn.php';
$id = $_GET['id'];
$result = $mysql->query("SELECT * FROM product where product_id = ".$id);
$data = $result->fetch_assoc();


$category_id = $data['category_id'];

$realted_product_query = $mysql->query("SELECT * FROM product where category_id =".$category_id." && product_id != ".$id." LIMIT 4");
$related_products = $realted_product_query->fetch_all(MYSQLI_ASSOC);
$related_products_count = count($related_products);


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

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

<style type="text/css">
    


.my-pro-qty {
    width: 140px;
    height: 50px;
    display: inline-block;
    position: relative;
    text-align: center;
    background: #f5f5f5;
    margin-bottom: 5px;
}

.my-pro-qty input {
    height: 100%;
    width: 100%;
    font-size: 16px;
    color: #6f6f6f;
    width: 50px;
    border: none;
    background: #f5f5f5;
    text-align: center;
}

.my-pro-qty .qtybtn {
    width: 35px;
    font-size: 16px;
    color: #6f6f6f;
    cursor: pointer;
    display: inline-block;
}
.shoping__cart__table table tbody tr td.shoping__cart__quantity .my-pro-qty {
    width: 120px;
    height: 40px;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .my-pro-qty input {
    color: #1c1c1c;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .my-pro-qty input::placeholder {
    color: #1c1c1c;
}

.shoping__cart__table table tbody tr td.shoping__cart__quantity .my-pro-qty .qtybtn {
    width: 15px;
}
</style>

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

    <!-- Product Details Section Begin -->
    
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?= "../admin/images/".$data['image'] ?>" alt="">
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?= $data['product_name']?></h3>
                        
                        <div class="product__details__price"><?= $data['price']?>$</div>
                        <p>Description :<?= $data['description']?></p>
                       
                        <?php if(isAuthUser()) { ?>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="my-pro-qty">
                                    <input type="text" id='display_count' value="1" min="1">
                                </div>
                            </div>
                        </div>
                        <form method="GET" action="addtocart.php">
                            <input type="hidden" name="id" value="<?= $data['product_id']?>">
                            <input type="hidden" name="product_count" id="count" value="1">
                            <input type="hidden" name="price" value="<?= $data['price'] ?>">
                            <input type="hidden" name="page" value="display">
                            <input type="hidden" name="increase">
                            <button type="submit" class="primary-btn">ADD TO CARD</button>
                        </form>
                    <?php }else { ?>

                        <a class="primary-btn" href="customerlogin.php">Login First</a>
                    <?php }?>
                        
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            
                           
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <?php if($related_products_count > 0) { ?>
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($related_products as $key => $related_product) { ?>
                   
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= "../admin/images/".$related_product['image'] ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="display.php?id=<?=$related_product['product_id']?>"><?= $related_product['product_name'] ?></a></h6>
                            <h5><?= $related_product['price'] ?></h5>
                        </div>
                    </div>
                </div>

              <?php } ?>
            </div>
        </div>
    </section>
<?php } ?> 
    <!-- Related Product Section End -->

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

    <script type="text/javascript">

        $(document).ready(()=> {
              var proQty = $('.my-pro-qty');
                proQty.prepend('<span class="dec btn qtybtn">-</span>');
                proQty.append('<span class="inc btn qtybtn">+</span>');
               
                $('.inc').click(()=> {
                    console.log('increase')
                     let count =  $('#count').val()
                     console.log(count)
                     $('#count').val( Number(count) + 1)
                     $('#display_count').val( Number(count) + 1)
                })

                $('.dec').click(()=> {
                    console.log('decrease')
                    let count =  $('#count').val()
                    if(count > 1)
                    {
                     $('#count').val( Number(count) - 1)
                     $('#display_count').val( Number(count) - 1)
                    }
                })
        })



    </script>


</body>

</html>