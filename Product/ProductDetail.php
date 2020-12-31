<?php
    include_once('Service/ProductService.php');
    $productRepo = new ProductRepository();
    $productService = new ProductService($productRepo);

    // $_GET ... 
    $data = $productService->getProductById("90");
    $product = count($data) > 0 ? $data[0]: null;
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

</html>

<head>
    <title><?php echo $product['name']?></title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!--//tags -->
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui1.css">
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>

    <body data-new-gr-c-s-check-loaded="14.990.0" data-gr-ext-installed="">
        <!-- header-bot-->
        <div class="header-bot">
            <div class="header-bot_inner_wthreeinfo_header_mid">
                <!-- header-bot-->
                <div class="col-md-4 logo_agile">
                    <h1>
                        <a href="index.html">
                            <span>O</span>izoioi <span>M</span>art
                            <img src="../images/logo2.png" alt=" " style="width: 70px; height: 70px;" />
                        </a>
                    </h1>
                </div>
                <!-- header-bot -->
                <div class="col-md-8 header">
                    <!-- header lists -->
                    <ul>

                        <span class="fa fa-phone" aria-hidden="true"></span> 028 3915 5812

                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal1">
                                <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal2">
                                <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
                        </li>
                    </ul>
                    <!-- //header lists -->
                    <!-- search -->
                    <div class="agileits_search">
                        <form action="#" method="post">
                            <input name="Search" type="search" placeholder="Search" required="">
                            <button type="submit" class="btn btn-default" aria-label="Left Align">
                                <span class="fa fa-search" aria-hidden="true"> </span>
                            </button>
                        </form>
                    </div>
                    <!-- //search -->
                    <!-- cart details -->
                    <div class="top_nav_right">
                        <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                            <form action="#" method="post" class="last">
                                <input type="hidden" name="cmd" value="_cart">
                                <input type="hidden" name="display" value="1">
                                Cart
                                <button class="w3view-cart" type="submit" name="submit" value="">
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- //cart details -->
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- page -->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <div class="container">
                    <ul class="w3_short">
                        <li>
                            <a href="index.html">Home</a>
                            <i>|</i>
                        </li>
                        <li>
                            Details
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- //page -->

        <!-- Single Page -->
        <div class="banner-bootom-w3-agileits">
            <div class="container">
                <!-- tittle heading -->

                <!-- //tittle heading -->
                <div class="col-md-5 single-right-left ">
                    <div class="grid ../images/_3_of_2">
                        <div class="flexslider">

                            <div class="clearfix"></div>
                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides"
                                    style="width: 1000%; transition-duration: 0s; transform: translate3d(-383px, 0px, 0px);">
                                    <li data-thumb="../images/<?php echo $product['image']?>" class="clone"
                                        aria-hidden="true" style="width: 383px; float: left; display: block;">
                                        <div class="thumb-image">
                                            <img src="../images/<?php echo $product['image']?>" data-imagezoom="true"
                                                class="img-responsive" alt="" draggable="false">
                                        </div>
                                    </li>

                                    <li data-thumb="../images/<?php echo $product['image']?>"
                                        style="width: 383px; float: left; display: block;" class="clone"
                                        aria-hidden="true">
                                        <div class="thumb-image">
                                            <img src="../images/<?php echo $product['image']?>" class="img-responsive"
                                                alt="" draggable="false">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 single-right-left simpleCart_shelfItem">
                    <h3><?php echo $product['name']?></h3>
                    <p>
                        <span class="item_price">
                            $<?php echo $product['price']?>
                        </span>
                        <label>Free delivery</label>
                    </p>
                    <div class="single-infoagile">
                        <ul>
                            <?php
                                $descript = explode('-',$product['description']);
                                echo trim($descript[0]);
                                array_shift($descript); ?>
                            <li></li>
                            <?php
                                foreach($descript as $script) { 
                            ?>
                            <li><?php echo "- ".trim($script) ?></li>
                            <?php
                                }
                            ?>

                            <li>View:
                                <?php echo ++$product['view']?>
                            </li>

                            <li>
                                Quantity in stock:
                                <?php echo $product['quantity']?>
                            </li>

                            <li>
                            </li>

                            <li>Manufactured by:
                                <?php echo $productService->getManuNameByProductId($product['productID']) ?>
                            </li>
                        </ul>
                    </div>
                    <div class="product-single-w3l">
                        <p>
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i>Pantry Cashback Offer
                        </p>
                        <p>
                            <i class="fa fa-refresh" aria-hidden="true"></i>All products are
                            <label>returnable.</label>
                        </p>
                    </div>
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="business" value=" ">
                                    <input type="hidden" name="item_name" value="Zeeba Premium Basmati Rice - 5 KG">
                                    <input type="hidden" name="amount" value="951.00">
                                    <input type="hidden" name="discount_amount" value="1.00">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="return" value=" ">
                                    <input type="hidden" name="cancel_return" value=" ">
                                    <input type="submit" name="submit" value="Add to cart" class="button">
                                </fieldset>
                            </form>
                        </div>

                    </div>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!-- //Single Page -->

        <!-- special offers -->
        <div class="featured-section" id="projects">
            <div class="container">
                <!-- tittle heading -->
                <h3 class="tittle-w3l">Related Products
                    <span class="heading-style">
                        <i></i>
                        <i></i>
                        <i></i>
                    </span>
                </h3>
                <!-- //tittle heading -->
                <div class="content-bottom-in">
                    <div class="nbs-flexisel-container">
                        <div class="nbs-flexisel-inner">
                            <ul id="flexiselDemo1" class="nbs-flexisel-ul" style="left: 0px;">
                                <?php
                                    $relatedPros = $productService->getRelatedProducts($product['productID']);
                                    foreach ($relatedPros as $relatedPro) {
                                ?>
                                <li class="nbs-flexisel-item" style="width: 345px; height: 470px">
                                    <div class="w3l-specilamk">
                                        <div class="speioffer-agile">
                                            <a href="single2.html">
                                                <img src="../images/<?php echo $relatedPro["image"]; ?>" alt=""
                                                    style="width: 280px; height: 250px">
                                            </a>
                                        </div>
                                        <div class="product-name-w3l">
                                            <h4 style="height: 50px;">
                                                <a href="single2.html">
                                                    <?php echo $relatedPro["name"]; ?>
                                                </a>
                                            </h4>
                                            <div class="w3l-pricehkj">
                                                <h6>$<?php echo $relatedPro["price"]; ?></h6>
                                            </div>
                                            <div
                                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                                <form action="#" method="post">
                                                    <fieldset>
                                                        <input type="hidden" name="cmd" value="_cart">
                                                        <input type="hidden" name="add" value="1">
                                                        <input type="hidden" name="business" value=" ">
                                                        <input type="hidden" name="item_name"
                                                            value="<?php echo $relatedPro["name"]; ?>">
                                                        <input type="hidden" name="amount"
                                                            value="<?php echo $relatedPro["price"]; ?>">

                                                        <input type="hidden" name="currency_code" value="d">
                                                        <input type="hidden" name="return" value=" ">
                                                        <input type="hidden" name="cancel_return" value=" ">
                                                        <input type="submit" name="submit" value="Add to cart"
                                                            class="button">
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php 
                                    }
                                ?>
                            </ul>
                            <div class="nbs-flexisel-nav-left" style="top: 180.5px;"></div>
                            <div class="nbs-flexisel-nav-right" style="top: 180.5px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //special offers -->

        <!-- footer -->
        <footer>
            <div class="container">
                <!-- footer first section -->

                <!-- //footer first section -->
                <!-- footer second section -->
                <div class="w3l-grids-footer">
                    <div class="col-xs-4 offer-footer">
                        <div class="col-xs-4 icon-fot">
                            <span class="fa fa-map-marker" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-8 text-form-footer">
                            <h3>Track Your Order</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-4 offer-footer">
                        <div class="col-xs-4 icon-fot">
                            <span class="fa fa-refresh" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-8 text-form-footer">
                            <h3>Free &amp; Easy Returns</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-xs-4 offer-footer">
                        <div class="col-xs-4 icon-fot">
                            <span class="fa fa-times" aria-hidden="true"></span>
                        </div>
                        <div class="col-xs-8 text-form-footer">
                            <h3>Online cancellation </h3>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- //footer second section -->
                <!-- footer third section -->
                <div class="footer-info w3-agileits-info">
                    <!-- footer categories -->
                    <div class="col-sm-5 address-right">
                        <div class="col-xs-6 footer-grids">
                            <h3>Categories</h3>
                            <ul>
                                <li>
                                    <a href="product.html">Flower</a>
                                </li>
                                <li>
                                    <a href="product.html">Cake</a>
                                </li>
                                <li>
                                    <a href="product.html">Gift</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //footer categories -->
                    <!-- quick links -->
                    <div class="col-sm-5 address-right">

                        <div class="col-xs-6 footer-grids">
                            <h3>Get in Touch</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>27 Nguyen Van Cu, Q.5, HCM
                                </li>
                                <li>
                                    <i class="fa fa-mobile" style="margin-left: 5px;"></i>
                                    098 683 4120
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i> 028 3915 5812
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <a href="mailto:pyon@mail.com"> pyon@gmail.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //quick links -->
                    <!-- social icons -->
                    <div class="col-sm-2 footer-grids  w3l-socialmk">
                        <h3>Follow Us on</h3>
                        <div class="social">
                            <ul>
                                <li>
                                    <a class="icon fb" href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="icon tw" href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="icon gp" href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //social icons -->
                    <div class="clearfix"></div>
                </div>
                <!-- //footer third section -->
                <!-- footer fourth section (text) -->
                <!-- //footer fourth section (text) -->
            </div>
        </footer>
        <!-- //footer -->

        <!-- copyright -->
        <div class="copy-right">
            <div class="container">
                <p>© 2020 Tinna Shoppy. All rights reserved</p>
            </div>
        </div>
        <!-- //copyright -->

        <!-- smoothscroll -->
        <script src="../js/SmoothScroll.min.js"></script>
        <!-- //smoothscroll -->

        <!-- start-smooth-scrolling -->
        <script src="../js/move-top.js"></script>
        <script src="../js/easing.js"></script>
        <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
        </script>
        <!-- //end-smooth-scrolling -->

        <!-- smooth-scrolling-of-move-up -->
        <script>
        $(document).ready(function() {
            /*
            var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
        </script>
        <!-- //smooth-scrolling-of-move-up -->
        <a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span>To Top</a>
    </body>
</body>

</html>