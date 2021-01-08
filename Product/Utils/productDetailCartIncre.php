<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['productID']) && isset($_SESSION['unpaidItems'])) {
  $productID = $_POST['productID'];
  $oldProductID = $_POST['oldProductID'];
  if (array_key_exists($productID, $_SESSION['unpaidItems'])) {
    $_SESSION['unpaidItems'][$productID] += 1;
  } else {
    $_SESSION['unpaidItems'][$productID] = 1;
  }
  $_SESSION['unpaidItems']['count'] += 1;
  header('location: ../View/productDetail.php?productID=' . $oldProductID);
}
