<?php
// session start
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

// init unpaidItems
if (!isset($_SESSION['unpaidItems'])) {
  $_SESSION['unpaidItems'] = array();
  $_SESSION['unpaidItems']['count'] = 0;
}
