<?php
date_default_timezone_set("Asia/Kolkata");
include_once(__DIR__ . '/../Service/OrderService.php');
include(__DIR__ . '/../DTO/OrderDTO.php');

$order = new OrderDTO(
  $_POST['orderID'],
  'NULL',
  $_POST['totalPrice'],
  'NULL',
  date("Y-m-d H:i:s")
);

$orderService = new OrderService(new OrderRepo());
try {
  $result = $orderService->updateOrder($order);
  if ($result == true) {
    header('location: admin_listOrder.php?updateStatus=success');
    exit();
  } else {
    header('location: admin_listOrder.php?error=updateFail');
    exit();
  }
} catch (Exception $ex) {
  throw $ex;
  echo '<script> alert("' . $ex . '"); </script>';
  header('location: updateOrder.php?orderID=' . $order->orderID);
  exit();
}
