<?php

    include_once('../DTO/OrderDTO.php');

    //include product module.



    //get unpaid item array
    $items = $unpaidItems;

    $orders = new OrderDTO;
    $order->orderID = 1;
    

    
?>
<?php

include_once('../Service/OrderService.php');
include_once('../Views/orderDetail.php');

echo $arr[0];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Checkout :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script>
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/login_overlay.css" rel='stylesheet' type='text/css' />
<link href="css/style6.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/shop.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/checkout.css">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/fontawesome-all.css" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Inconsolata:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
    rel="stylesheet">
</head>

<body>

<?php   
        $orderService = new OrderService(new OrderRepo);
        $data = $orderService->getAllOrders();
?>

<div class="banner-top container-fluid" id="home">
    <!-- header -->
    <header>
        
    <!-- banner -->
    <div class="banner_inner">
        <div class="services-breadcrumb">
            <div class="inner_breadcrumb">

                <ul class="short">
                    <li>
                        <a href="index.html">Home</a>
                        <i>|</i>
                    </li>
                    <li>Checkout </li>
                </ul>
            </div>
        </div>

    </div>
   
    <div class="container">
        <div class="inner-sec-shop px-lg-4 px-3">
            <h3 class="tittle-w3layouts my-lg-4 mt-3">Checkout </h3>
            <div class="checkout-right">
                <h4>Your shopping cart contains:
                    <span> 
                        <?php  
                            $productNum = count($data);
                            echo $productNum . ($productNum > 1 ? " Products" : " Product"); 
                        ?>
                    </span>
                </h4>
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach($data as $order): ?>
                            
                            <tr class="rem1">
                                <td class="invert"><?php echo $order['id']; ?></td>
                                <td class="invert-image">
                                    <a href="single.html">
                                        <img src="images/s1.jpg" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                            <div class="entry value">
                                                <span> <?php echo $order['saleQuantity'];?> </span>
                                            </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="invert"><?php echo $order['productName']; ?> </td>

                                <td class="invert"><?php echo ($order['price'] * $order['saleQuantity']); ?></td>
                                <td class="invert">
                                    <div class="rem">
                                        <div class="close1"> </div>
                                    </div>

                                </td>
                            
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="checkout-left row">
                <div class="col-md-4 checkout-left-basket">
                    <ul style="text-align: center">
                    </ul>
                </div>
                <div class="col-md-8 address_form">
                    
                </div>

                <div class="clearfix"> </div>

            </div>
            <div style="float: right; background-color: green">
                <b style="font-size: 0.6cm;">Total - <?php echo getTotalPrice();?></b>

               <button onclick="AddToOrder()">Payment</button>
            </div>

            
            
        </div>
       
    </div>
    
            
</section>
<!--//checkout-->
<!--footer -->

<!-- //footer -->
<!--jQuery-->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- newsletter modal -->
<!--search jQuery-->
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/classie-search.js"></script>
<script src="js/demo1-search.js"></script>
<!--//search jQuery-->
<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
    googles.render();

    googles.cart.on('googles_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script>
<!-- //cart-js -->
<script>
    $(document).ready(function () {
        $(".button-log a").click(function () {
            $(".overlay-login").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });
    });
    $('.overlay-close1').on('click', function () {
        $(".overlay-login").fadeToggle(200);
        $(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
</script>
<!-- carousel -->
<!-- easy-responsive-tabs -->
<script src="js/easy-responsive-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!--quantity-->
<script>
    $('.value-plus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) + 1;
        divUpd.text(newVal);
    });

    $('.value-minus').on('click', function () {
        var divUpd = $(this).parent().find('.value'),
            newVal = parseInt(divUpd.text(), 10) - 1;
        if (newVal >= 1) divUpd.text(newVal);
    });
</script>
<!--quantity-->
<!--close-->
<script>
    $(document).ready(function (c) {
        $('.close1').on('click', function (c) {
            $('.rem1').fadeOut('slow', function (c) {
                $('.rem1').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close2').on('click', function (c) {
            $('.rem2').fadeOut('slow', function (c) {
                $('.rem2').remove();
            });
        });
    });
</script>
<script>
    $(document).ready(function (c) {
        $('.close3').on('click', function (c) {
            $('.rem3').fadeOut('slow', function (c) {
                $('.rem3').remove();
            });
        });
    });
</script>
<!--//close-->

<!-- dropdown nav -->
<script>
    $(document).ready(function () {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //dropdown nav -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
        });
    });
</script>
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

<script>

    function AddToOrder()
    {
        <?php ?>
    }

</script>

<!--// end-smoth-scrolling -->


<script src="js/bootstrap.js"></script>
<!-- js file -->
</body>

</html>
