<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['productID'])) {
  $cateID = $_POST['cateID'];
  $manuID = $_POST['manuID'];
  $currentPage = $_POST['page'];
  $searchContent = $_POST['search'];
  $price = $_POST['price'];
  $productID = $_POST['productID'];
  array_push($_SESSION['unpaidItems'], $productID);
  header(
    'location: search.php?cateID=' . $cateID . '&manuID=' . $manuID . '&page=' . $currentPage . '&searchContent=' . $searchContent . '&price=' . $price
  );
}
