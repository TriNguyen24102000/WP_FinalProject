<?php

session_start();
include(__DIR__ . '/../Service/OrderService.php');
include_once(__DIR__ . '/../../User/Service/UserService.php');


$orderService = new OrderService(new OrderRepo());
$orderID = $_GET['orderID'];
$order = $orderService->getOrderByID($orderID);

$userService = new UserService(new UserRepo());
$currentUser = $userService->getUserByID($order['userID']);
$users = $userService->getAllUsers();
?>


<!DOCTYPE html>
<html>

<head>
  <title>Update Form</title>
  <link rel="stylesheet" type="text/css" href="../../User/Views/css/updateForm.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <div class="container right-panel-active" id="container">
    <form action="checkUpdateOrder.php" method="POST">
      <h1 style="padding-top: 15px"> Order </h1>
      <input type="hidden" name="orderID" value="<?php echo $orderID ?>">
      <div>
        <label>Create Date: </label>
        <input type="text" disabled name="createAt" value="<?php echo $order['createAt']; ?>">
      </div>

      <div>
        <label>Last update: </label>
        <input type="text" disabled name="updateAt" value="<?php echo $order['updateAt']; ?>">
      </div>

      <div>
        <label>Total ($): </label>
        <input type="number" name="totalPrice" value="<?php echo $order['totalPrice']; ?>">
      </div>
      <br><br>
      <button type="submit" style="margin-top:5px">Update</button>
    </form>
</body>

</html>