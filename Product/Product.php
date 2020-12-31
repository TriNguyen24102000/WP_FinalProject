<?php
    include_once('Service/ProductService.php');
    $productRepo = new ProductRepository();
    $productService = new ProductService($productRepo);

    // get categori ID
    $products = $productService->getProductsByCateId($cateId = '2');

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>MartFast</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
    addEventListener(
        'load',
        function() {
            setTimeout(hideURLbar, 0)
        },
        false
    )

    function hideURLbar() {
        window.scrollTo(0, 1)
    }
    </script>
    <!--//tags -->
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <!--pop-up-box-->
    <link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!--//pop-up-box-->
    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="../css/jquery-ui1.css" />
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet" />
</head>

<body>
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
            <div class=" col-md-8 header">
                <!-- header lists -->
                <ul>
                    <li><span class="fa fa-phone" aria-hidden="true"></span>028 3915 5812</li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal1">
                            <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal2">
                            <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up
                        </a>
                    </li>
                </ul>
                <!-- //header lists -->
                <!-- search -->
                <div class="agileits_search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search" required="" />
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
                            <input type="hidden" name="cmd" value="_cart" />
                            <input type="hidden" name="display" value="1" />
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
                        <div>
                            <form action="#" method="post">
                                <select id="agileinfo-nav_search" name="agileinfo_search" required="">
                                    <option value="">All Categories</option>
                                    <option value="Kitchen">Flower</option>
                                    <option value="Household">Food</option>
                                    <option value="Snacks &amp; Beverages">Gift</option>
                                </select>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- //page -->

    <!-- top Products -->
    <div class="ads-grid">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                Flower product
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <!-- product left -->
            <div class="side-bar col-md-3">
                <div class="search-hotel">
                    <h3 class="agileits-sear-head">Search Here..</h3>
                    <form action="#" method="post">
                        <input type="search" placeholder="Product name..." name="search" required="" />
                        <input type="submit" value=" " />
                    </form>
                </div>
                <!-- price range -->
                <div class="range">
                    <h3 class="agileits-sear-head">Price range</h3>
                    <ul class="dropdown-menu6">
                        <li>
                            <div id="slider-range"></div>
                            <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal" />
                        </li>
                    </ul>
                </div>
                <!-- //price range -->
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="agileinfo-ads-display col-md-9 w3l-rightpro">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec1">
                        <?php 
                        for ($i = 1; $i <= 9; $i++) {

                        ?>
                        <div class="col-xs-4 product-men" style="width: 260px; height: 420px">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="../images/<?php echo $products[$i]['image']?>" alt=""
                                        style="width: 230px; height: 200px" />
                                </div>
                                <div class="item-info-product">
                                    <h4 style="height: 33px;">
                                        <a href="single.html"><?php echo $products[$i]['name']?></a>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price">$<?php echo $products[$i]['price']?></span>
                                    </div>
                                    <div
                                        class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                        <form action="#" method="post">
                                            <fieldset>
                                                <input type="hidden" name="cmd" value="_cart" />
                                                <input type="hidden" name="add" value="1" />
                                                <input type="hidden" name="business" value=" " />
                                                <input type="hidden" name="item_name"
                                                    value="Zeeba Basmati Rice - 5 KG" />
                                                <input type="hidden" name="amount" value="950.00" />
                                                <input type="hidden" name="discount_amount" value="1.00" />
                                                <input type="hidden" name="currency_code" value="USD" />
                                                <input type="hidden" name="return" value=" " />
                                                <input type="hidden" name="cancel_return" value=" " />
                                                <input type="submit" name="submit" value="Add to cart" class="button" />
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        <div class="clearfix"></div>
                    </div>
                    <!-- //first section -->

                    <div class="text-center">
                        <ul class="pagination pagination-lg">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- //product right -->
        </div>
    </div>
    <!-- //top products -->

    <!-- special offers -->
    <div class="featured-section" id="projects">
        <div class="container">
            <!-- tittle heading -->
            <h3 class="tittle-w3l">
                Special Offers
                <span class="heading-style">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </h3>
            <!-- //tittle heading -->
            <div class="content-bottom-in">
                <ul id="flexiselDemo1">
                    <?php 
                    for($i = 1; $i <= 10; $i++) {
                    ?>
                    <li>
                        <div class="w3l-specilamk">
                            <div class="speioffer-agile">
                                <a href="single.html">
                                    <img src="../images/<?php echo $products[$i]['image']?>" alt=""
                                        style="width: 230px; height: 200px" />
                                </a>
                            </div>
                            <div class="product-name-w3l">
                                <h4>
                                    <a href="single.html"><?php echo $products[$i]['name']?></a>
                                </h4>
                                <div class="w3l-pricehkj">
                                    <h6>$<?php echo $products[$i]['price']?></h6>
                                </div>
                                <div
                                    class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                    <form action="#" method="post">
                                        <fieldset>
                                            <input type="hidden" name="cmd" value="_cart" />
                                            <input type="hidden" name="add" value="1" />
                                            <input type="hidden" name="business" value=" " />
                                            <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                                            <input type="hidden" name="amount" value="220.00" />
                                            <input type="hidden" name="discount_amount" value="1.00" />
                                            <input type="hidden" name="currency_code" value="USD" />
                                            <input type="hidden" name="return" value=" " />
                                            <input type="hidden" name="cancel_return" value=" " />
                                            <input type="submit" name="submit" value="Add to cart" class="button" />
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php 
                    }?>
                </ul>
            </div>
        </div>
    </div>
    <!-- //special offers -->

    <!-- copyright -->
    <div class="copy-right">
        <div class="container">
            <p>© 2020 Tinna Shoppy. All rights reserved</p>
        </div>
    </div>
    <!-- //copyright -->

    <!-- js-files -->
    <!-- jquery -->
    <script src="../js/jquery-2.1.4.min.js"></script>

    <!-- price range (top products) -->
    <script src="../js/jquery-ui.js"></script>
    <script>
    //<![CDATA[
    $(window).load(function() {
        $('#slider-range').slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function(event, ui) {
                $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1])
            },
        })
        $('#amount').val('$' + $('#slider-range').slider('values', 0) + ' - $' + $('#slider-range').slider(
            'values', 1))
    }) //]]>
    </script>
    <!-- //price range (top products) -->

    <!-- flexisel (for special offers) -->
    <script src="../js/jquery.flexisel.js"></script>
    <script>
    $(window).load(function() {
        $('#flexiselDemo1').flexisel({
            visibleItems: 3,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1,
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2,
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2,
                },
            },
        })
    })
    </script>
    <!-- //flexisel (for special offers) -->

    <!-- smoothscroll -->
    <script src="../js/SmoothScroll.min.js"></script>
    <!-- //smoothscroll -->

    <!-- start-smooth-scrolling -->
    <script src="../js/move-top.js"></script>
    <script src="../js/easing.js"></script>
    <script>
    jQuery(document).ready(function($) {
        $('.scroll').click(function(event) {
            event.preventDefault()

            $('html,body').animate({
                    scrollTop: $(this.hash).offset().top,
                },
                1000
            )
        })
    })
    </script>
    <!-- //end-smooth-scrolling -->

    <!-- for bootstrap working -->
    <script src="../js/bootstrap.js"></script>
    <!-- //for bootstrap working -->
    <!-- //js-files -->
</body>

</html>