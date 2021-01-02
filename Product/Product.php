<?php
include_once('Service/ProductService.php');

include('../Category/Service/CategoryService.php');

include('Helper/Helper.php');

$db = Connect();

// category
$categoryRepo = new CategoryRepository($db);
$categoryService = new CategoryService($categoryRepo);
// get all categories
$categories = $categoryService->getAllCategories();


// get selected category
$cateID = isset($_POST["cate-option"]) ? $_POST["cate-option"] : 1;
$cateID = isset($_GET['cateID']) ? $_GET['cateID'] : $cateID;

// get selected filter
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'no';
$filter = isset($_POST['filter-option']) ? $_POST['filter-option'] : $filter;

// get selected manufacture id
$manuID = isset($_POST['manu-option']) ? $_POST['manu-option'] : 'no';

// get current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// get selected category
$selectedCate = $categoryService->getCategoryById($cateID);

// product
$productRepo = new ProductRepository($db);
$productService = new ProductService($productRepo);

// manufactures
$manufactures = $productService->getAllManufactures();

// paging
$totalRows = count($productService->getProductsByCateId($cateID));
$itemPerPage = 6;
$totalPage = intval($totalRows / $itemPerPage);
$currentPage = $currentPage > $totalPage ? $totalPage : $currentPage;
$currentPage = $currentPage < 1 ? 1 : $currentPage;

$limit = ($currentPage - 1) * $itemPerPage;

$products = $productService->getPagingProducts($limit, $cateID, $manuID, $filter, $itemPerPage);

echo 'manuID: ' . $manuID . 'cateID: ' . $cateID;
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title><?php echo $selectedCate['name'] ?></title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
				<h1 style="margin-top: 30px; margin-left: -100px;">
					<a href="index.html" <span>O</span>izoioi <span>M</span>art
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
							<form action="Product.php?page=1" method="post">
								<select id="agileinfo-nav_search" name="cate-option" style="width: 200px;" onChange="this.form.submit()">
									<?php
									foreach ($categories as $category) {
									?>
										<option <?php echo (strval($cateID) == strval($category["cateID"]) ? "selected" : "") ?> value="<?php echo $category["cateID"] ?>">
											<?php echo $category["name"] ?>
										</option>
									<?php
									}
									?>
								</select>
							</form>
						</div>
					</li>
					<li>of</li>
					<li>
						<div>
							<form action="Product.php?page=1&cateID=<?php echo  $cateID ?>" method="post">
								<select id="agileinfo-nav_search" name="manu-option" style="width: 200px;" onChange="this.form.submit()">
									<option selected value="no">
										All manufactures
									</option>
									<?php
									foreach ($manufactures as $manufacture) {
									?>
										<option <?php echo (strval($manuID) == strval($manufacture["manuID"]) ? "selected" : "") ?> value="<?php echo $manufacture["manuID"] ?>">
											<?php echo $manufacture["name"] ?>
										</option>
									<?php
									}
									?>
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
				<?php echo $selectedCate['name'] ?> products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<!-- price range -->
				<div class="range">
					<h3 class="agileits-sear-head">Filter</h3>
					<div>
						<form action="Product.php?page=<?php echo $currentPage ?>&cateID=<?php echo $cateID ?>" method="POST">
							<select id="agileinfo-nav_search" name="filter-option" onChange="this.form.submit()">
								<option <?php echo (strval($filter) == "no" ? "selected" : "") ?> value="no">No</option>
								<option <?php echo (strval($filter) == "low-to-high" ? "selected" : "") ?> value="low-to-high">Low to high price</option>
								<option <?php echo (strval($filter) == "high-to-low" ? "selected" : "") ?> value="high-to-low">high to low price</option>
								<option <?php echo (strval($filter) == "newest" ? "selected" : "") ?> value="newest">
									newest product</option>
							</select>
						</form>
					</div>
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
						for ($i = 0; $i < 6; $i++) {
						?>
							<div class="col-xs-4 product-men" style="width: 260px; height: 420px">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<a href="ProductDetail.php?id=<?php echo $products[$i]['productID'] ?>">
											<img src="../images/<?php echo $products[$i]['image'] ?>" alt="" style="width: 230px; height: 200px" />
										</a>
									</div>
									<div class="item-info-product">
										<h4 style="height: 33px;">
											<a href="ProductDetail.php?id=<?php echo $products[$i]['productID'] ?>"><?php echo $products[$i]['name'] ?>
											</a>
										</h4>
										<div class="info-product-price">
											<span class="item_price">$<?php echo $products[$i]['price'] ?></span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<form action="#" method="post">
												<fieldset>
													<input type="hidden" name="cmd" value="_cart" />
													<input type="hidden" name="add" value="1" />
													<input type="hidden" name="business" value=" " />
													<input type="hidden" name="item_name" value="Zeeba Basmati Rice - 5 KG" />
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
							<li class="page-item"><a class="page-link" href="Product.php?page=
							<?php
							echo ($currentPage - 1 == 0 ? 1 : $currentPage - 1)
								. '&filter=' . $filter . '&cateID=' . $cateID ?>">Previous</a>
							</li>

							<?php
							$idx = intval($currentPage / 5);
							$start = $idx == 0 ? $idx * 5 + 1 : $idx * 5;
							for ($i = $start; $i < ($start + 5); $i++) {
								if ($i == $currentPage) {
									echo '<li class="page-item active"><a class="page-link" 
                          href="">' . $i . '</a></li>';
								} else if ($i > $totalPage) {
									echo '<li class="page-item"><a class="page-link" 
                          href="">' . $i . '</a></li>';
								} else {
									echo '<li class="page-item"><a class="page-link" 
                          href="Product.php?page=' . $i . '&filter=' . $filter . '&cateID=' . $cateID . '">' . $i . '</a></li>';
								}
							}
							?>
							<li class="page-item"><a class="page-link" href="Product.php?page=<?php echo ($currentPage + 1 > $totalPage ? $totalPage : $currentPage + 1) . '&filter=' . $filter . '&cateID=' . $cateID ?>">Next</a>
							</li>
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
					$relatedPros = $productService->getRelatedProductsByCateID($cateID, 10);
					foreach ($relatedPros as $relatedPro) {
					?>
						<li>
							<div class="w3l-specilamk">
								<div class="speioffer-agile">
									<a href="ProductDetail.php?id=<?php echo $relatedPro['productID'] ?>">
										<img src="../images/<?php echo $relatedPro['image'] ?>" alt="" style="width: 230px; height: 200px" />
									</a>
								</div>
								<div class="product-name-w3l">
									<h4 style="height: 33px;">
										<a href="ProductDetail.php?id=<?php echo $relatedPro['productID'] ?>">
											<?php echo $relatedPro['name'] ?>
										</a>
									</h4>
									<div class="w3l-pricehkj">
										<h6>$<?php echo $relatedPro['price'] ?></h6>
									</div>
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
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
					} ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>© 2020 Oizoioi Mart. All rights reserved</p>
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