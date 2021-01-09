<?php
session_start();
$_SESSION['unpaidItems'][$_GET['productID']] = intval(
  $_GET['quantity']
);
