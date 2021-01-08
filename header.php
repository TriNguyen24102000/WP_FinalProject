<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (!isset($_SESSION['unpaidItems'])) {
  $_SESSION['unpaidItems'] = array();
  $_SESSION['unpaidItems']['count'] = 0;
}

if (!isset($_SESSION['uid'])) {
  $_SESSION['uid'] = '-1';
}
$cartCount = isset($_SESSION['unpaidItems']) ? count($_SESSION['unpaidItems']) : 0;
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
  <!--/tags -->
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
          <a href="indexx.php">
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
          <form action="Search/search.php?page=1&cateID=no&manuID=no" method="post">
            <input name="search" type="search" placeholder="Search" required="" />
            <button type="submit" class="btn btn-default" aria-label="Left Align">
              <span class="fa fa-search" aria-hidden="true"> </span>
            </button>
          </form>
        </div>
        <!-- //search -->
        <!-- cart details -->
        <div class="top_nav_right">
          <div class="wthreecartaits wthreecartaits2 cart cart box_1">
            <form action="Order/Views/user_listOrder.php" method="post" class="last">
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
</body>

</html>