<?php
session_start();
if (isset($_POST['productID']) && isset($_SESSION['unpaidItems'])) {
  $productID  = $_POST['productID'];
  $cateID = $_POST['cateID'];
  $manuID = $_POST['manuID'];
  $page = $_POST['page'];
  $filter = $_POST['filter'];

  if (array_key_exists($productID, $_SESSION['unpaidItems'])) {
    $_SESSION['unpaidItems'][$productID] += 1;
  } else {
    $_SESSION['unpaidItems'][$productID] = 1;
  }

  $_SESSION['unpaidItems']['count'] += 1;

  header('location: ../View/product.php?cateID=' . $cateID . '&manuID=' . $manuID . '&page=' . $page . '&filter=' . $filter);
}
