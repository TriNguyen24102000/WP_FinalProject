<?php

include_once(__DIR__ . '/../Utils/functions.php');

class OrderRepo
{
	private $conn;
	public function __construct()
	{
		$this->conn =	OrderConnect();
	}

	public function getAllOrders()
	{
		try {
			$sql = "SELECT * FROM `order_detail` JOIN `order` ON `order_detail`.orderID = `order`.orderID JOIN `product` ON `order_detail`.productID = `product`.productID";
			$stmt = $this->conn->query($sql);

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}

			return $data;
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	public function getOrderByID($id)
	{
		try {
			$sql = "SELECT * FROM `order` WHERE orderID = :orderID";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(":orderID", $id);

			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		}
	}

	public function getLastOrderID()
	{
		$sql = "SELECT `orderID` FROM `order` ORDER BY `orderID` DESC LIMIT 1";
		$stmt = $this->conn->query($sql);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insertOrderToDB($userID, $totalPrice)
	{
		$orderID = $this->getLastOrderID()['orderID'] + 1;
		$sql = "INSERT INTO `order`(`orderID`, `userID`, `totalPrice`) 
		VALUES (:orderID, :userID, :totalPrice)";

		$stmt = 	$this->conn->prepare($sql);
		$stmt->bindValue(':userID', $userID);
		$stmt->bindValue(':orderID', $orderID);
		$stmt->bindValue(':totalPrice', $totalPrice);

		$stmt->execute();

		$numRow = $stmt->rowCount();

		if ($numRow > 0)
			return true;
		return false;
	}

	public function deleteOrderFromDB($id)
	{
		$sql = "DELETE `order` WHERE orderID = :orderID";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue('order', $id);

		$stmt->execute();

		$numRow = $stmt->rowCount();

		return $numRow > 0 ? true : false;
	}

	public function updateOrder(OrderDTO $orderDTO)
	{

		$sql = "UPDATE `order` SET userID = :userID,
                                       totalPrice = :totalPrice,
                                       createAt = :createAt,
                                       updateAt = :updateAt";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':userID', $orderDTO->userID);
		$stmt->bindValue(':totalPrice', $orderDTO->totalPrice);
		$stmt->bindValue(':createAt', $orderDTO->createAt);
		$stmt->bindValue(':updateAt', $orderDTO->updateAt);

		$numRow = $stmt->rowCount();

		return $numRow > 0 ? true : false;
	}


	public function insertOrderDetail($orderID, $productID, $quantity, $purPrice)
	{
		$sql = "INSERT INTO `order_detail` (`orderID`, `productID`, `saleQuantity`, `purPrice`)
		VALUES('$orderID', '$productID', '$quantity', '$purPrice')";
		$this->conn->query($sql);
	}

	public function updateOrderTotalPrice($orderID, $totalPrice)
	{
		$sql = "UPDATE `order` SET `totalPrice`= $totalPrice WHERE `orderID` = $orderID";
		$this->conn->query($sql);
	}
}
