<?php
include_once(__DIR__ . '/../Utils/functions.php');

class CategoryRepo
{
	public $conn;
	// constructor
	public function __construct()
	{
		$this->conn = CategoryConnect();
	}
	// get all products
	public function getAllCategories()
	{
		$data = array();
		$sql = "SELECT * FROM `category`";
		$stmt = $this->conn->query($sql);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get category by id
	public function getCategoryById($cateID)
	{
		$data = array();
		$sql = "SELECT * FROM `category` WHERE `cateID`= $cateID";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$data[] = $stmt->fetch(PDO::FETCH_ASSOC);
		return $data[0];
	}

	// insert category
	public function insertCategory($name)
	{
		$sql = ("INSERT INTO `category` (`name`)
				VALUES('$name')");
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
	}

	// update category
	public function updateCategory($cateID, $name, $updateAt)
	{
		$sql = ("UPDATE `category` 
						SET 
						`name` = :name,
						`updateAt` = $updateAt
						WHERE `cateID` = $cateID");

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);
		$stmt->execute();
	}

	// delete category
	public function deleteCategory($cateID)
	{
		$sql = "DELETE `category` WHERE `cateID` = $cateID";
		$sql = "DELETE `category` WHERE `cateID` = $cateID";
		$sql = "DELETE `category` WHERE `cateID` = $cateID";
		$sql = "DELETE `category` WHERE `cateID` = $cateID";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
	}

	// get categories by name
	public function getCategoriesByName($name)
	{
		$sql = "SELECT * FROM `category` WHERE `name` LIKE '$name%'";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$data = array();
		$data[] = $stmt->fetch(PDO::FETCH_ASSOC);
		return $data[0];
	}
}
