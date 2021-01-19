<?php
session_start();
$_SESSION['uid'] = -1;
$_SESSION['unpaidItems'] = array();
$_SESSION['unpaidItems']['count'] = 0;
header('location: login.php');
