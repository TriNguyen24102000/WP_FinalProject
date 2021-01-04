<?php
// TO USE THIS product.php
// for example: href="product.php?page=1&cateID=1" for the first time navigate to
?>


<?php
include_once(__DIR__ . '/Product/Service/ProductService.php');
include_once(__DIR__ . '/Category/Service/CategoryService.php');
include_once(__DIR__ . '/Header/Header.php');
?>


<?php
// category
$categoryRepo = new CategoryRepo();
$categoryService = new CategoryService($categoryRepo);
// get all categories
$categories = $categoryService->getAllCategories();

// get current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// product
$productRepo = new ProductRepo();
$productService = new ProductService($productRepo);

$bestSellingProduct = $productService->getBestSellingProducts(10);
$newestProducts = $productService->getNewestProducts(10);
// load header
loadHeader('Home');
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
  <!--/tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!--pop-up-box-->
  <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
  <!--//pop-up-box-->
  <!-- price range -->
  <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css" />
  <!-- fonts -->
  <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet" />
</head>

<body>
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
              <form action="Product/View/product.php?page=1" method="post">
                <select id="agileinfo-nav_search" name="cate-option" style="width: 200px;" onChange="this.form.submit()">
                  <option selected disabled value="">All categories</option>
                  <?php
                  foreach ($categories as $category) {
                  ?>
                    <option value="<?php echo $category["cateID"] ?>">
                      <?php echo $category["name"] ?>
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

  <!-- special offers -->
  <div class="featured-section" id="projects" style="margin-top: 20px;">
    <div class="container">
      <!-- tittle heading -->
      <h3 class="tittle-w3l">
        Top 10 best selling products
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
          foreach ($bestSellingProduct as $product) {
          ?>
            <li>
              <div class="w3l-specilamk">
                <div class="speioffer-agile">
                  <div class="men-thumb-item">
                    <img src="images/<?php echo $product['image'] ?>" alt="" style="width: 280px; height: 250px">
                    <span class="product-new-top">sold: <?php echo $product['soldQuantity'] ?></span>
                  </div>
                </div>
                <div class="product-name-w3l">
                  <h4 style="height: 30px; font-size: 15px;">
                    <a href="productDetail.php?id=<?php echo $product['productID'] ?>">
                      <?php echo $product['name'] ?>
                    </a>
                  </h4>
                  <div class="w3l-pricehkj">
                    <h6>$<?php echo $product['price'] ?></h6>
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

  <!-- top 10 newest products -->
  <div class="featured-section" id="projects">
    <div class="container">
      <!-- tittle heading -->
      <h3 class="tittle-w3l">
        Top 10 newest products
        <span class="heading-style">
          <i></i>
          <i></i>
          <i></i>
        </span>
      </h3>
      <!-- //tittle heading -->
      <div class="content-bottom-in">
        <ul id="flexiselDemo2">
          <?php
          foreach ($newestProducts as $product) {
          ?>
            <li>
              <div class="w3l-specilamk">
                <div class="speioffer-agile">
                  <div class="men-thumb-item" style=" position: relative; display: inline-block;">
                    <img src="images/<?php echo $product['image'] ?>" alt="" style="width: 280px; height: 250px">
                    <span style="position: absolute; top: -8px; right: 0;"><?php echo $product['dayCreate'] . '/' . $product['monthCreate'] . '/' . $product['yearCreate'] ?></span>
                  </div>
                </div>
                <div class="product-name-w3l">
                  <h4 style="height: 33px;">
                    <a href="productDetail.php?id=<?php echo $product['productID'] ?>">
                      <?php echo $product['name'] ?>
                    </a>
                  </h4>
                  <div class="w3l-pricehkj">
                    <h6>$<?php echo $product['price'] ?></h6>
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
  <!-- //10 newest products -->

  <!-- copyright -->
  <div class="copy-right">
    <div class="container">
      <p>© 2020 Oizoioi Mart. All rights reserved</p>
    </div>
  </div>
  <!-- //copyright -->

  <!-- js-files -->
  <!-- jquery -->
  <script src="js/jquery-2.1.4.min.js"></script>

  <!-- flexisel (for special offers) -->
  <script src="js/jquery.flexisel.js"></script>
  <script>
    $(window).load(function() {
      $('#flexiselDemo1').flexisel({
        visibleItems: 3,
        animationSpeed: 1000,
        autoPlay: true,
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

  <script>
    $(window).load(function() {
      $('#flexiselDemo2').flexisel({
        visibleItems: 3,
        animationSpeed: 1000,
        autoPlay: true,
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
  <script src="js/SmoothScroll.min.js"></script>
  <!-- //smoothscroll -->

  <!-- start-smooth-scrolling -->
  <script src="js/move-top.js"></script>
  <script src="js/easing.js"></script>
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
  <script src="js/bootstrap.js"></script>
  <!-- //for bootstrap working -->
  <!-- //js-files -->
</body>

</html>