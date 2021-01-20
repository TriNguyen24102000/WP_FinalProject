<?php

include_once(__DIR__ . '/../Utils/functions.php');
include_once(__DIR__ . '/../DTO/UserDTO.php');

class UserRepo
{
	public function getAllUsers()
	{
		$data = array();
		$sql = "SELECT * FROM `user`";
		$stmt = Connect()->query($sql);

		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}

	public function getUserByID($id)
	{
		$sql = "SELECT * FROM `user` WHERE `userID` = :userID";
		$stmt = Connect()->prepare($sql);
		$stmt->bindValue(':userID', $id);

		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function insertUserToDB(UserDTO $userDTO)
	{
		$sql = "INSERT INTO `user`(`userID`, `username`, `password`, `name`, `dob`, `address`, `phone`, `createAt`, `email`, `updateAt`, `roleID`) VALUES (:userID,:username,:password,:name,:dob,:address,:phone,:createAt,:email,:updateAt,2)";

		$stmt = Connect()->prepare($sql);

		$stmt->bindValue(':userID', $userDTO->userID);
		$stmt->bindValue(':username', $userDTO->userName);
		$stmt->bindValue(':password', $userDTO->password);
		$stmt->bindValue(':name', $userDTO->name);
		$stmt->bindValue(':email', $userDTO->email);
		$stmt->bindValue(':dob', $userDTO->dob);
		$stmt->bindValue(':phone', $userDTO->phone);
		$stmt->bindValue(':address', $userDTO->address);
		$stmt->bindValue(':createAt', $userDTO->createAt);
		$stmt->bindValue(':updateAt', $userDTO->updateAt);

		$stmt->execute();

		$numRow = $stmt->rowCount();

		if ($numRow > 0)
			return true;
		return false;
	}

	public function deleteUserFromDB($id)
	{
		$queryDelFromOrderDetail_1 = "DELETE FROM `order_detail` WHERE `orderID` IN (SELECT o.`orderID` FROM `order` o JOIN `user` u ON o.`userID` = u.`userID` WHERE u.`userID` = $id)";
		$queryDelFromOrder_2 = "DELETE FROM `order` WHERE `userID` = $id";
		$queryDelFromUser_3 = "DELETE FROM `user` WHERE `userID` = $id";
		//perform
		Connect()->query($queryDelFromOrderDetail_1);
		Connect()->query($queryDelFromOrder_2);
		$stmt_3 = Connect()->query($queryDelFromUser_3);

		$numRow = $stmt_3->rowCount();

		return $numRow > 0 ? true : false;
	}

	public function updateUserToDB(UserDTO $userDTO)
	{

		$sql = "UPDATE `user` SET `username`=:username,`password`=:password, `name`= :fname,`dob`= :dob,`address`= :addr,`phone`= :phone,`createAt`= :createAt,`email`= :email,`updateAt`= :updateAt, `roleID`= 2 WHERE `userID`= :userID";
		$stmt = Connect()->prepare($sql);

		$stmt->bindValue(':userID', $userDTO->userID);
		$stmt->bindValue(':username', $userDTO->userName);
		$stmt->bindValue(':password', $userDTO->password);
		$stmt->bindValue(':fname', $userDTO->name);
		$stmt->bindValue(':dob', $userDTO->dob);
		$stmt->bindValue(':addr', $userDTO->address);
		$stmt->bindValue(':phone', $userDTO->phone);
		$stmt->bindValue(':email', $userDTO->email);
		$stmt->bindValue(':createAt', $userDTO->createAt);
		$stmt->bindValue(':updateAt', $userDTO->updateAt);

		$stmt->execute();

		$numRow = $stmt->rowCount();

		return $numRow > 0 ? true : false;
		
	}
}
