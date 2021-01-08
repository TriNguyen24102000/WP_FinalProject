<?php

class OrderDTO
{
	public $orderID;
	public $userID;
	public $totalPrice;
	public $createAt;
	public $updateAt;
	public function __construct($orderID, $userID, $totalPrice = 0, $createAt = "", $updateAt = "")
	{
		$this->orderID = $orderID;
		$this->$userID = $userID;
		$this->totalPrice = $totalPrice;
		$this->createAt = $createAt;
		$this->updateAt = $updateAt;
	}
}
