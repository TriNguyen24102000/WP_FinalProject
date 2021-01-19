<?php
session_start();
$_SESSION['unpaidItems'][$_GET['productID']] = intval(
  $_GET['quantity']
);

if (isset($_GET['act'])) {
  $act = $_GET['act'];
  if ($act == 'plus') {
    $_SESSION['unpaidItems']['count'] += 1;
  } else if ($act == 'minus') {
    $_SESSION['unpaidItems']['count'] -= 1;
  }
}
