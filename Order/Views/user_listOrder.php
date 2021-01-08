<?php
include_once(__DIR__ . '/../DTO/OrderDTO.php');
include_once(__DIR__ . '/../../Category/Service/CategoryService.php');
include_once(__DIR__ . '/../../Product/Service/ProductService.php');
include_once(__DIR__ . '/../../User/Service/UserService.php');
include_once(__DIR__ . '/../Service/OrderService.php');

// session start
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

// unpaidItems
$orderItems = null;
if (isset($_SESSION['unpaidItems'])) {
	if (isset($_POST['delProductID'])) {
		unset($_SESSION['unpaidItems'][$_POST['delProductID']]);
	}
	// set unpaindItems
	$orderItems = $_SESSION['unpaidItems'];

	// userID
	$userID = isset($_SESSION['uid']) ? $_SESSION['uid'] : '-1';

	// product service
	$productService = new ProductService(new ProductRepo());

	// check out
	if (isset($_GET['act'])) {
		if ($userID === '-1') {
			echo '<script> alert("Please login before make a payment"); </script>';
		} else {
			if (count($orderItems) > 0) {
				$orderService = new OrderService(new OrderRepo());
				// insert order with totalPrice = 0
				$orderService->insertOrder($userID, $total = 0);
				// get last inserted order
				$lastOrderID = $orderService->getLastOrder()['orderID'];
				// insert order_detail
				if ($orderItems != null) {
					$totalPrice = 0;
					foreach ($orderItems as $productID => $quantity) {
						if ($productID == 'count') {
							continue;
						}
						$pricePerItem = $productService->getProductById($productID)['price'];
						$purPrice = $orderService->insertOrderDetail(
							$lastOrderID,
							$productID,
							$quantity,
							($quantity * $pricePerItem)
						);
						$totalPrice += $quantity * $pricePerItem;
					}
					//update totalPrice
					$orderService->updateOrderTotalPrice($lastOrderID, $totalPrice);
					// reset cart
					$_SESSION['unpaidItems'] = array();
					$_SESSION['unpaidItems']['count'] = 0;
					// alert
					echo '<script> alert("Ordered!"); </script>';
					header('location: user_listOrder.php');
				}
			}
		}
	}
	// category service
	$categoryService = new CategoryService(new CategoryRepo());
	$categories = $categoryService->getAllCategories();
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Checkout</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../css/font-awesome.css" rel="stylesheet">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- header-bot-->
	<div class="header-bot">
		<div class="header-bot_inner_wthreeinfo_header_mid">
			<!-- header-bot-->
			<div class="col-md-4 logo_agile">
				<h1>
					<a href="../../indexx.php">
						<span>O</span>izoioi <span>M</span>art
					</a>
				</h1>
			</div>
			<!-- header-bot -->
			<div class=" col-md-8 header">
				<!-- header lists -->
				<ul>
					<li><span class="fa fa-phone" aria-hidden="true"></span>028 3915 5812</li>
					<li>
						<?php
						if ($userID == '-1') {
						?>
							<a href="../../User/Views/login.php">
								<span class="fas fa-user-circle" aria-hidden="true"></span> Sign In
							</a>
						<?php
						} else {
							$userService = new UserService(new UserRepo());
							$user = $userService->getUserByID($userID);
						?>
							<a href="../../User/Views/userDetail.php">
								<span class="fa fa-user-o" aria-hidden="true"></span> <?php echo $user['username'] ?>
							</a>
						<?php
						}
						?>
					</li>
					<li>
						<a href="../../User/Views/signup.php">
							<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up
						</a>
					</li>
				</ul>
				<!-- //header lists -->
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
						<a href="../../indexx.php">Home</a>
						<i>|</i>
					</li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- checkout page -->
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Checkout
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<?php
				if (!$orderItems || $orderItems['count'] == 0) {
					echo '<h4>Your shopping cart contains:
					<span>0 Product</span>
				</h4>';
				} else {
				?>
					<h4>Your shopping cart contains:
						<span><?php echo count($orderItems) - 1  ?> Products</span>
					</h4>
					<div class="table-responsive">
						<table class="timetable_sub">
							<thead>
								<tr>
									<th>SL No.</th>
									<th>Product</th>
									<th>Quality</th>
									<th>Product Name</th>
									<th>Price ($)</th>
									<th>Remove</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$idx = 1;
								$total = 0;
								foreach ($orderItems as $productID => $quantity) {
									if ($productID == 'count') {
										continue;
									}
									$product = $productService->getProductById($productID);
									$total += $product['price'] * $quantity;
								?>
									<tr class="rem<?php echo $idx ?>">
										<td class="invert"><?php echo $idx ?></td>
										<td class="invert-image">
											<a href="../../Product/View/productDetail.php?productID=<?php echo $productID ?>">
												<img src="../../images/<?php echo $product['image'] ?>" alt=" " style="width: 50px; height:50px;" class="img-responsive">
											</a>
										</td>
										<td class="invert">
											<div class="quantity">
												<div class="quantity-select">
													<div class="entry value-minus" name="quantity<?php echo $idx ?>">&nbsp;</div>
													<div class="entry value">
														<span name="quantity"><?php echo $quantity ?></span>
													</div>
													<div class="entry value-plus active" name="quantity<?php echo $idx ?>">&nbsp;</div>
												</div>
											</div>
										</td>
										<td class="invert" name="name<?php echo $idx ?>" id="<?php echo $productID ?>"><?php echo $product['name'] ?></td>
										<td class="invert" name="price<?php echo $idx ?>"><?php echo $product['price'] * $quantity ?></td>
										<td class="invert">
											<div class="rem">
												<form action="user_listOrder.php" method="POST">
													<input type="hidden" name="delProductID" value="<?php echo $productID ?>">
													<input type="submit" name="submit" value="X" class="button" />
												</form>
											</div>
										</td>
									</tr>
								<?php
									$idx++;
								} ?>
							</tbody>
						</table>
					</div>
			</div>
			<div class="checkout-left" style="text-align: right;">
				<div class="address_form_agile">
					<div class="checkout-right-basket">
						<p id="total-price">Total: $<?php echo $total ?></p>
						<a href="user_listOrder.php?act=payment">Make a Payment
							<span class="fa fa-hand-o-right" aria-hidden="true"></span>
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			<?php
				}
			?>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

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
							<?php
							foreach ($categories as $category) {
								echo ('<li>
                    <a href="../../Product/View/product.php?page=1&cateID='
									. $category['cateID']
									. '">'
									. $category['name']
									. '</a>
                        </li>');
							}
							?>
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
		</div>
	</footer>
	<!-- //footer -->

	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2020 Oizoioi Mart. All rights reserved</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="../../js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->


	<!-- cart-js -->
	<script src="../../js/minicart.js"></script>

	<!--quantity-->
	<script>
		var newVal;
		$('.value-plus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);

			var remIdx = $(this).parent().context;
			var idx = remIdx.getAttribute('name');
			idx = idx.replace('quantity', '');

			var priceEle = $(`td[name*="price${idx}"]`);
			pricePerItem = parseInt(priceEle.text(), 10) / (newVal - 1);

			priceEle.text(parseInt(priceEle.text(), 10) + pricePerItem);

			var totalEle = $('#total-price')[0];
			var totalVal = totalEle.textContent;
			var newTotal = parseInt(totalVal.replace('Total: $', '')) + pricePerItem;

			totalEle.textContent = `Total: $${newTotal}`;

			var nameEle = $(`td[name*="name${idx}"]`)[0];
			var productID = parseInt(nameEle.getAttribute('id'));
			var quantity = newVal;
			$.ajax({
				url: 'updateUnpaidItems.php',
				data: {
					productID: productID,
					quantity: quantity
				}
			}).done(function(data) {
				console.log("result: " + data);
			});
		});

		$('.value-minus').on('click', function() {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) {
				divUpd.text(newVal)
				var remIdx = $(this).parent().context;
				var idx = remIdx.getAttribute('name');
				idx = idx.replace('quantity', '');

				var priceEle = $(`td[name*="price${idx}"]`);
				pricePerItem = parseInt(priceEle.text(), 10) / (newVal + 1);

				priceEle.text(parseInt(priceEle.text(), 10) - pricePerItem);

				var totalEle = $(`#total-price`)[0];
				var totalVal = totalEle.textContent;
				var newTotal = parseInt(totalVal.replace('Total: $', '')) - pricePerItem;

				totalEle.textContent = `Total: $${newTotal}`;

				var nameEle = $(`td[name*="name${idx}"]`)[0];
				var productID = parseInt(nameEle.getAttribute('id'));
				var quantity = newVal;
				$.ajax({
					url: 'updateUnpaidItems.php',
					data: {
						productID: productID,
						quantity: quantity
					}
				}).done(function(data) {
					console.log("result: " + data);
				});
			};
		});
	</script>
	<!--quantity-->

	<!--//quantity-->

	<!-- smoothscroll -->
	<script src="../../js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="../../js/move-top.js"></script>
	<script src="../../js/easing.js"></script>
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

	<!-- for bootstrap working -->
	<script src="../../js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>