<?php

include_once(__DIR__ . '/../Utils/functions.php');
include_once(__DIR__ . '/../Service/OrderService.php');
$orderService = new OrderService(new OrderRepo());
$userIDChoosen = $_GET['orderID'];
$action = $_GET['action'];

if (isset($action)) {
  if ($action == "deleteOrder") {
    $orderService->deleteOrder($userIDChoosen);
    header('location: admin_listOrder.php?deleteStatus=true');
    exit();
  }
  if ($action == "updateOrder") {
    header("location: updateOrder.php?orderID=$userIDChoosen");
    exit();
  }
}
