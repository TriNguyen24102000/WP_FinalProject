<?php
include_once('Service/ProductService.php');
include('Helper/Helper.php');
include('../Category/Service/CategoryService.php');
include('../Header/Header.php');

$db = Connect();

// product 
$productRepo = new ProductRepository($db);
$productService = new ProductService($productRepo);

// GET product
$id =  $_GET["id"];
$product = $productService->getProductById($id);
$product['view']++;
$productService->updateProduct($product);

// categories
$categoryService = new CategoryService(new CategoryRepository($db));
$categories = $categoryService->getAllCategories();
loadHeader($product['name']);
?>

<!DOCTYPE html>
<html lang="zxx">

</html>

<head>
  <!--/tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
              <?php echo 'Category ' . $productService->getCateNameByProductId($id) ?>
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
                <ul class="slides" style="width: 1000%; transition-duration: 0s; transform: translate3d(-383px, 0px, 0px);">
                  <li data-thumb="../images/<?php echo $product['image'] ?>" class="clone" aria-hidden="true" style="width: 383px; float: left; display: block;">
                    <div class="thumb-image">
                      <img src="../images/<?php echo $product['image'] ?>" data-imagezoom="true" class="img-responsive" alt="" draggable="false">
                    </div>
                  </li>

                  <li data-thumb="../images/<?php echo $product['image'] ?>" style="width: 383px; float: left; display: block;" class="clone" aria-hidden="true">
                    <div class="thumb-image">
                      <img src="../images/<?php echo $product['image'] ?>" class="img-responsive" alt="" draggable="false">
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 single-right-left simpleCart_shelfItem">
          <h3><?php echo $product['name'] ?></h3>
          <p>
            <span class="item_price">
              $<?php echo $product['price'] ?>
            </span>
            <label>Free delivery</label>
          </p>
          <div class="single-infoagile">
            <ul>
              <?php
              $descript = explode('-', $product['description']);
              echo trim($descript[0]);
              array_shift($descript); ?>
              <li></li>
              <?php
              foreach ($descript as $script) { ?>
                <li><?php echo "- " . trim($script) ?></li>
              <?php
              }
              ?>

              <li>View:
                <?php echo ++$product['view'] ?>
              </li>

              <li>
                Quantity in stock:
                <?php echo $product['quantity'] ?>
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
        <h3 class="tittle-w3l">
          Related Products
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
            foreach ($productService->getRelatedProducts($product['productID'], 5) as $relatePro) {
            ?>
              <li>
                <div class="w3l-specilamk">
                  <div class="speioffer-agile">
                    <a href="ProductDetail.php?id=<?php echo $relatePro['productID'] ?>">
                      <img src="../images/<?php echo $relatePro['image'] ?>" alt="" style="width: 230px; height: 200px" />
                    </a>
                  </div>
                  <div class="product-name-w3l">
                    <h4 style="height: 33px;">
                      <a href="ProductDetail.php?id=<?php echo $relatePro['productID'] ?>">
                        <?php echo $relatePro['name'] ?>
                      </a>
                    </h4>
                    <div class="w3l-pricehkj">
                      <h6>$<?php echo $relatePro['price'] ?></h6>
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
                    <a href="Product.php?page=1&cateID='
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
    <!-- jquery -->
    <script src="../js/jquery-2.1.4.min.js"></script>

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