<?php
include_once(__DIR__ . '/User/Service/UserService.php');

// session start
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// init unpaidItems
if (!isset($_SESSION['unpaidItems'])) {
  $_SESSION['unpaidItems'] = array();
  $_SESSION['unpaidItems']['count'] = 0;
}

// init userID default
if (!isset($_SESSION['uid'])) {
  $_SESSION['uid'] = '-1';
}
// current userID
$userID = isset($_SESSION['uid']) ? $_SESSION['uid'] : '-1';

// number of products in cart
$cartCount = isset($_SESSION['unpaidItems']) ?   $_SESSION['unpaidItems']['count'] : 0;
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
  <link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../../css/font-awesome.css" rel="stylesheet" />
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
          <a href="../../User/Views/adminProfile.php">
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

              <a href="../../User/Views/login.php">
                <span class="fas fa-user-circle" aria-hidden="true"></span> Sign In
              </a>
            </li>
          <?php
          } else {
            $userService = new UserService(new UserRepo());
            $user = $userService->getUserByID($userID);
          ?>
            <li>
              <a href="../../User/Views/login.php">
                <span class="fa fa-user-o" aria-hidden="true"></span> <?php echo $user['username'] ?>
              </a>
            </li>
            <li>
              <a href="../../User/Views/logout.php">
                <span class="fa fa-power-off" aria-hidden="true"></span>Logout
              </a>
            </li>
          <?php
          }
          ?>
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
            <a href="../../User/Views/adminProfile.php">Home</a>
            <i>|</i>
          </li>
          <li>
            <div>
              <select id="agileinfo-nav_search" name="cate-option" style="width: 250px;" onchange="location = this.value;">
                <option value="#">Choose management</option>
                <option value="../../Category/Views/admin_category.php">Category</option>
                <option value="../../Product/Views/admin_product.php">Product</option>
                <option value="../../User/Views/adminProfile.php">User</option>
                <option value="../../Order/Views/admin_listOrder.php">Order</option>
                <option value="../../Manufacturer/Views/admin_ManuList.php">Manufacturer</option>
              </select>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- //page -->
</body>

</html>