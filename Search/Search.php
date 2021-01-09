<?php
include_once(__DIR__ . '/../Product/Service/ProductService.php');
include_once(__DIR__ . '/../Category/Service/CategoryService.php');
include_once(__DIR__ . '/../User/Service/UserService.php');
// include_once(__DIR__ . '/../header.php');
?>

<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (!isset($_SESSION['unpaidItems'])) {
  $_SESSION['unpaidItems'] = array();
  $_SESSION['unpaidItems']['count'] = 0;
}
if (!isset($_SESSION['uid'])) {
  $_SESSION['uid'] = '';
}
$cartCount = isset($_SESSION['unpaidItems']) ? $_SESSION['unpaidItems']['count'] : 0;

$userID = $_SESSION['uid'] ? $_SESSION['uid'] : '-1';

?>

<?php
// category
$categoryRepo = new CategoryRepo();
$categoryService = new CategoryService($categoryRepo);
// get all categories
$categories = $categoryService->getAllCategories();

// get selected category
$cateID = isset($_GET['cateID']) ? $_GET['cateID'] : (isset($_POST['cate-option']) ? $_POST['cate-option'] : 'no');

// get selected manufacture id
$manuID = isset($_GET['manuID']) ? $_GET['manuID'] : (isset($_POST['manu-option']) ? $_POST['manu-option'] : 'no');

// get current page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// get SearchContent
$searchContent = isset($_GET['searchContent']) ? $_GET['searchContent'] : (isset($_POST['search']) ? $_POST['search'] : 'nothing');

// get price
$price = isset($_GET['price']) ? $_GET['price'] : (isset($_POST['price']) ? $_POST['price'] : 'no');
$price1 = 'no';
$price2 = 'no';
if ($price != 'no') {
  $price = explode(' - ', $price);
  $price1 = intval(ltrim($price[0], '$'));
  $price2 = intval(ltrim($price[1], '$'));
}


// product
$productRepo = new ProductRepo();
$productService = new ProductService($productRepo);

// manufactures
$manufactures = $productService->getAllManufactures();

// paging
$totalRows = count($productService->getSearchProducts($searchContent, $cateID, $manuID, $price1, $price2));
$itemPerPage = 6;
$totalPage = intval($totalRows / $itemPerPage);
$currentPage = $currentPage > $totalPage ? $totalPage : $currentPage;
$currentPage = $currentPage < 1 ? 1 : $currentPage;

$limit = ($currentPage - 1) * $itemPerPage;

$products = $productService->getPagingSearchProducts($searchContent, $cateID, $manuID, $price1, $price2, $limit, $itemPerPage);
?>



<!DOCTYPE html>
<html lang="zxx">

<head>
  <!--/tags -->
  <title>Search Results</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script>
    addEventListener(
      "load",
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
  <style>
    .badge {
      padding-left: 9px;
      padding-right: 9px;
      -webkit-border-radius: 9px;
      -moz-border-radius: 9px;
      border-radius: 9px;
    }

    .label-warning[href],
    .badge-warning[href] {
      background-color: #fffdfa;
    }

    #lblCartCount {
      font-size: 12px;
      background: transparent;
      color: #fff;
      padding: 0 5px;
      vertical-align: top;
      margin-left: -10px;
    }
  </style>
</head>

<body>
  <!-- header-bot-->
  <div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
      <!-- header-bot-->
      <div class="col-md-4 logo_agile">
        <h1 style="margin-top: 30px; margin-left: -100px;">
          <a href="../indexx.php">
            <span>O</span>izoioi <span>M</span>art
          </a>
        </h1>
      </div>
      <!-- header-bot -->
      <div class=" col-md-8 header">
        <!-- header lists -->
        <ul>
          <li><span class="fa fa-phone" aria-hidden="true"></span>028 3915 5812</li>
          <?php
          if ($userID == '-1') {
          ?>
            <li>

              <a href="../User/Views/login.php">
                <span class="fas fa-user-circle" aria-hidden="true"></span> Sign In
              </a>
            </li>
          <?php
          } else {
            $userService = new UserService(new UserRepo());
            $user = $userService->getUserByID($userID);
          ?>
            <li>
              <a href="../User/Views/userDetail.php">
                <span class="fa fa-user-o" aria-hidden="true"></span> <?php echo $user['username'] ?>
              </a>
            </li>
            <li>
              <a href="../User/Views/logout.php">
                <span class="fa fa-power-off" aria-hidden="true"></span>Logout
              </a>
            </li>
          <?php
          }
          ?>
          <li>
            <a href="../User/Views/signup.php">
              <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up
            </a>
          </li>
        </ul>
        <!-- //header lists -->
        <!-- search -->
        <div class="agileits_search">
          <form action="search.php?page=1&cateID=no&manuID=no" method="post">
            <input name="search" type="search" placeholder="Search" required="" />
            <button type="submit" class="btn btn-default value-plus" aria-label="Left Align">
              <span class="fa fa-search" aria-hidden="true"> </span>
            </button>
          </form>
        </div>
        <!-- //search -->
        <!-- cart details -->
        <div class="top_nav_right">
          <div class="wthreecartaits wthreecartaits2 cart cart box_1">
            <form action="../Order/Views/user_listOrder.php" method="post" class="last">
              <input type="hidden" name="cmd" value="_cart" />
              <input type="hidden" name="display" value="1" />
              <button class="w3view-cart" style="width: 60px; height:44px;" type="submit" name="submit" value="">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                <span class='badge badge-warning' id='lblCartCount'> <?php echo $cartCount ?> </span>
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
            <a href="../indexx.php">Home</a>
            <i>|</i>
            <!-- tittle heading -->
            <i style="margin-top: 10px; margin-bottom: 10px; ">
              <?php
              echo 'Found '
                . $totalRows
                . '-product of '
                . "'$searchContent'" .
                ' (category: '
                . ($cateID != 'no' ? $categoryService->getCategoryById($cateID)['name'] : 'not set')
                . ', made by: '
                . ($manuID != 'no' ? $productService->getManufacturerById($manuID)['name']
                  . ')' : 'not set)')
                . ', price: ' .
                $price1 . '-' . $price2 ?>
            </i>
            <!-- //tittle heading -->
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- //page -->

  <!-- top Products -->
  <div>
    <div class="container">

      <!-- product left -->
      <div class="side-bar col-md-3">
        <!-- price range -->
        <div class="range">
          <h3 class="agileits-sear-head text-center">Advance</h3>
          <form action="search.php?page=1&searchContent=<?php echo $searchContent ?>" method="post">
            <!-- price range -->
            <div class="range">
              <h4 class="agileits-sear-head">Price range</h4>
              <ul class="dropdown-menu6">
                <li>
                  <div id="slider-range"></div>
                  <input type="text" name="price" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
                </li>
              </ul>
            </div>

            <!-- //price range -->
            <h4 class="agileits-sear-head" style="margin-top: 10px; margin-bottom: 10px;">Category</h4>
            <div>
              <select id="agileinfo-nav_search" name="cate-option" style="width: 200px;">
                <option selected value="no">
                  All categories
                </option>
                <?php
                foreach ($categories as $category) {
                ?>
                  <option <?php
                          echo (strval($cateID) == strval($category["cateID"]) ? "selected" : "") ?> value="<?php echo $category["cateID"] ?>">
                    <?php echo $category["name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>

            <h4 class="agileits-sear-head" style="margin-top: 10px; margin-bottom: 10px;">Manufacture</h4>
            <div>
              <select id="agileinfo-nav_search" name="manu-option" style="width: 200px;">
                <option selected value="no">
                  All manufactures
                </option>
                <?php
                foreach ($manufactures as $manufacture) {
                ?>
                  <option <?php
                          echo (strval($manuID) == strval($manufacture["manuID"]) ? "selected" : "") ?> value="<?php echo $manufacture["manuID"] ?>">
                    <?php echo $manufacture["name"] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>

            <button type="submit" style="margin: 10px;" class="btn btn-primary">Search</button>
          </form>
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
            foreach ($products as $product) {
            ?>
              <div class="col-xs-4 product-men" style="width: 260px; height: 420px">
                <div class="men-pro-item simpleCart_shelfItem">
                  <div class="men-thumb-item">
                    <a href="../Product/View/productDetail.php?productID=<?php echo $product['productID'] ?>">
                      <img src="../images/<?php echo $product['image'] ?>" alt="" style="width: 230px; height: 200px" />
                    </a>
                  </div>
                  <div class="item-info-product">
                    <h4 style="height: 33px;">
                      <a href="../Product/View/productDetail.php?productID=<?php echo $product['productID'] ?>">
                        <?php echo $product['name'] ?>
                      </a>
                    </h4>
                    <div class="info-product-price">
                      <span class="item_price">$<?php echo $product['price'] ?></span>
                    </div>
                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                      <form action="searchCartIncre.php" method="post">
                        <fieldset>
                          <input type="hidden" name="search" value="<?php echo $searchContent ?>" />
                          <input type="hidden" name="manuID" value="<?php echo $manuID ?>" />
                          <input type="hidden" name="cateID" value="<?php echo $cateID ?>" />
                          <input type="hidden" name="page" value="<?php echo $currentPage ?>" />
                          <input type="hidden" name="productID" value="<?php echo $product['productID'] ?>" />
                          <input type="hidden" name="price" value="<?php echo $price ?>" />
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
              <li class="page-item"><a class="page-link" href="Search.php?page=
							<?php
              echo ($currentPage - 1 == 0 ? 1 : $currentPage - 1)
                . '&cateID=' . $cateID . '&manuID=' . $manuID . '&searchContent=' . $searchContent ?>">Previous</a>
              </li>
              <?php
              $idx = intval($currentPage / 5);
              $start = $idx == 0 ? $idx * 5 + 1 : $idx * 5;
              for ($i = $start; $i < ($start + 5); $i++) {
                if ($i == $currentPage || $i > $totalPage) {
                  echo '<li class="page-item active"><a class="page-link" href="">' . $i . '</a></li>';
                } else {
                  echo '<li class="page-item"><a class="page-link" href="Search.php?page=' . $i
                    . '&cateID='
                    . $cateID
                    . '&manuID='
                    . $manuID
                    . '&searchContent='
                    . $searchContent
                    . '">'
                    . $i
                    . '</a></li>';
                }
              }
              ?>
              <li class="page-item"><a class="page-link" href="Search.php?page=
              <?php echo ($currentPage + 1 > $totalPage ? $totalPage : $currentPage + 1) . '&manuID='
                . $manuID
                . '&cateID='
                . $cateID
                . '&searchContent='
                . $searchContent ?>">Next</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- //product right -->
    </div>
  </div>
  <!-- //top products -->

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
        values: [25, 30],
        slide: function(event, ui) {
          $('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1])
        },
      })
      $('#amount').val('$' + $('#slider-range').slider('values', 0) + ' - $' + $('#slider-range').slider(
        'values', 1))
    }) //]]>
  </script>
  <!-- //price range (top products) -->


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