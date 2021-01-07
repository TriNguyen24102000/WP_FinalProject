<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['productID'])) {
  $productID = $_POST['productID'];
  $oldProductID = $_POST['oldProductID'];
  array_push($_SESSION['unpaidItems'], $productID);
  echo $productID;
  header('location: ../View/productDetail.php?productID=' . $oldProductID);
}
