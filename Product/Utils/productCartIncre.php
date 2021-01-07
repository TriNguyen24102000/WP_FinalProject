<?php
session_start();
echo "haha";
if (isset($_POST['productID'])) {
  $productID  = $_POST['productID'];
  $cateID = $_POST['cateID'];
  $manuID = $_POST['manuID'];
  $page = $_POST['page'];
  $filter = $_POST['filter'];
  array_push($_SESSION['unpaidItems'], $productID);
  echo count($_SESSION['unpaidItems']);
  header('location: ../View/product.php?cateID=' . $cateID . '&manuID=' . $manuID . '&page=' . $page . '&filter=' . $filter);
}
