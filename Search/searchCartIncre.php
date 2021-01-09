<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (isset($_POST['productID']) && isset($_SESSION['unpaidItems'])) {
  $cateID = $_POST['cateID'];
  $manuID = $_POST['manuID'];
  $currentPage = $_POST['page'];
  $searchContent = $_POST['search'];
  $price = $_POST['price'];

  $productID = $_POST['productID'];

  if (array_key_exists($productID, $_SESSION['unpaidItems'])) {
    $_SESSION['unpaidItems'][$productID] += 1;
  } else {
    $_SESSION['unpaidItems'][$productID] = 1;
  }

  $_SESSION['unpaidItems']['count'] += 1;
  header(
    'location: search.php?cateID=' . $cateID . '&manuID=' . $manuID . '&page=' . $currentPage . '&searchContent=' . $searchContent . '&price=' . $price
  );
}
