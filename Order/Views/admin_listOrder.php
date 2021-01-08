<?php

include_once('../Service/OrderService.php');
include_once('../Views//orderDetail.php');

echo $arr[0];

?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    
<table>

<?php

echo $arr[0];
// $userService = new OrderService(new OrderRepo);
// $data = $userService->getAllOrders();
?>

<?php //foreach($data as $temp): 
?>
    <tr>
        
        <td>//<?php echo $temp['orderID']; ?></td>
    </tr>
<?php //endforeach; 
?>

</table>

</body>
</html> -->

<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Goggles Ecommerce Category Bootstrap responsive Web Template | Checkout :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Goggles a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function() {
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
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>

	<?php
	$orderService = new OrderService(new OrderRepo);
	$data = $orderService->getAllOrders();
	?>

	<div class="banner-top container-fluid" id="home">
		<!-- header -->
		<header>
			<label class="top-log mx-auto"></label>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">

					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav nav-mega mx-auto">
						<li class="nav-item">
							<a class="nav-link ml-lg-0" href="index.html">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.html">About</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Features
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<ul>
												<li class="media-mini mt-3">
													<a href="shop.html">Designer Glasses</a>
												</li>
												<li class="">
													<a href="shop.html"> Ray-Ban</a>
												</li>
												<li>
													<a href="shop.html">Prescription Glasses</a>
												</li>
												<li class="mt-3">
													<h5>View more pages</h5>
												</li>
												<li class="mt-2">
													<a href="about.html">About</a>
												</li>
												<li>
													<a href="customer.html">Customers</a>
												</li>
											</ul>
										</div>
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<div class="media-mini mt-3">
												<a href="shop.html">
													<img src="images/g2.jpg" class="img-fluid" alt="">
												</a>
											</div>
										</div>
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub">Tittle goes here </h5>
											<div class="media-mini mt-3">
												<a href="shop.html">
													<img src="images/g3.jpg" class="img-fluid" alt="">
												</a>
											</div>

										</div>
									</div>
									<hr>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Shop
							</a>
							<ul class="dropdown-menu mega-menu ">
								<li>
									<div class="row">
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<ul>
												<li class="media-mini mt-3">
													<a href="shop.html">Designer Glasses</a>
												</li>
												<li class="">
													<a href="shop.html"> Ray-Ban</a>
												</li>
												<li>
													<a href="shop.html">Prescription Glasses</a>
												</li>
												<li>
													<a href="shop.html">Rx Sunglasses</a>
												</li>
												<li>
													<a href="shop.html">Contact Lenses</a>
												</li>
												<li>
													<a href="shop.html">Multifocal Glasses</a>
												</li>
												<li>
													<a href="shop.html">Kids Glasses</a>
												</li>
												<li>
													<a href="shop.html">Lightweight Glasses</a>
												</li>
												<li>
													<a href="shop.html">Sports Glasses</a>
												</li>
											</ul>
										</div>
										<div class="col-md-4 media-list span4 text-left">
											<h5 class="tittle-w3layouts-sub"> Tittle goes here </h5>
											<ul>
												<li class="media-mini mt-3">

													<a href="shop.html">Brooks Brothers</a>
												</li>
												<li>
													<a href="shop.html">Persol</a>
												</li>
												<li>
													<a href="shop.html">Polo Ralph Lauren</a>
												</li>
												<li>
													<a href="shop.html">Prada</a>
												</li>
												<li>
													<a href="shop.html">Ray-Ban Jr</a>
												</li>
												<li>
													<a href="shop.html">Sferoflex</a>
												</li>
											</ul>
											<ul class="sub-in text-left">

												<li>
													<a href="shop.html">Polo Ralph Lauren</a>
												</li>
												<li>
													<a href="shop.html">Prada</a>
												</li>
												<li>
													<a href="shop.html">Ray-Ban Jr</a>
												</li>
											</ul>

										</div>
										<div class="col-md-4 media-list span4 text-left">

											<h5 class="tittle-w3layouts-sub-nav">Tittle goes here </h5>
											<div class="media-mini mt-3">
												<a href="shop.html">
													<img src="images/g1.jpg" class="img-fluid" alt="">
												</a>
											</div>

										</div>
									</div>
									<hr>
								</li>
							</ul>


						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contact</a>
						</li>

					</ul>

				</div>
			</nav>
		</header>
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
		<!--//banner -->
	</div>
	<!--// header_top -->
	<!--checkout-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
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
								<th>Sale Quantity</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>State</th>
							</tr>
						</thead>
						<tbody>

							<?php foreach ($data as $order) : ?>

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
												<div class="entry value">
													<span> <?php echo $order['saleQuantity']; ?> </span>
												</div>
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

		googles.cart.on('googles_checkout', function(evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<script>
		$(document).ready(function() {
			$(".button-log a").click(function() {
				$(".overlay-login").fadeToggle(200);
				$(this).toggleClass('btn-open').toggleClass('btn-close');
			});
		});
		$('.overlay-close1').on('click', function() {
			$(".overlay-login").fadeToggle(200);
			$(".button-log a").toggleClass('btn-open').toggleClass('btn-close');
			open = false;
		});
	</script>
	<!-- carousel -->
	<!-- easy-responsive-tabs -->
	<script src="js/easy-responsive-tabs.js"></script>
	<script>
		$(document).ready(function() {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function(event) { // Callback function if tab is switched
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
		$('.value-plus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<!--close-->
	<script>
		$(document).ready(function(c) {
			$('.close1').on('click', function(c) {
				$('.rem1').fadeOut('slow', function(c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(c) {
			$('.close2').on('click', function(c) {
				$('.rem2').fadeOut('slow', function(c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(c) {
			$('.close3').on('click', function(c) {
				$('.rem3').fadeOut('slow', function(c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//close-->

	<!-- dropdown nav -->
	<script>
		$(document).ready(function() {
			$(".dropdown").hover(
				function() {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function() {
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
		function AddToOrder() {
			<?php ?>
		}
	</script>

	<!--// end-smoth-scrolling -->


	<script src="js/bootstrap.js"></script>
	<!-- js file -->
</body>

</html>