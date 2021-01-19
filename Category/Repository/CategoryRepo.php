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
		$sql = "UPDATE `category` 
						SET
								`name` = :name,
								`updateAt` = :updateAt
						WHERE cateID = :cateID";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindValue(':name', $name);
		$stmt->bindValue(':updateAt', $updateAt);
		$stmt->bindValue(':cateID', $cateID);
		$stmt->execute();
		$numRow = $stmt->rowCount();
		return $numRow > 0 ? true : false;
	}

	// delete category
	public function deleteCategory($cateID)
	{
		$sql1 = "SELECT productID FROM `product` WHERE cateID = $cateID";
		$delProds = $this->conn->query($sql1);
		$data = array();
		while ($row = $delProds->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}

		try {

			foreach ($data as $productID) {
				$this->conn->query("DELETE FROM `order_detail` WHERE productID = $productID");
			}
		} catch (\Throwable $th) {
			//throw $th;
		}



		$queryDelProductContainCate = "DELETE FROM `product` WHERE `cateID` = $cateID";
		$queryDelCate = "DELETE FROM `category` WHERE `cateID` = $cateID";

		//perform

		try {
			$this->conn->query($queryDelProductContainCate);
		} catch (\Throwable $th) {
			//throw $th;
		}
		$stmt_3 = $this->conn->query($queryDelCate);

		$numRow = $stmt_3->rowCount();

		return $numRow > 0 ? true : false;
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
