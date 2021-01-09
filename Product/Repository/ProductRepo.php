<?php
include_once(__DIR__ . '/../DTO/ProductDTO.php');
include_once(__DIR__ . '/../Utils/functions.php');

class ProductRepo
{
	public $conn;

	// constructor
	public function __construct()
	{
		$this->conn = ProductConnect();
	}

	// get all products
	public function getAllProducts()
	{
		$data = array();
		$sql = "SELECT * FROM `product`";
		$stmt = $this->conn->query($sql);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get all product by id
	public function getProductById($id)
	{
		$data = array();
		$sql = "SELECT * FROM `product` WHERE `productID` = $id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data[0];
	}

	// get all products by category id
	public function getProductsByCateId($cateID)
	{
		$data = array();
		$sql = "SELECT * FROM `product` WHERE `cateID` = $cateID";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get related product
	public function getRelatedProducts($id, $limit)
	{
		$data = array();
		$sql = ("SELECT * FROM `product` p1 
					WHERE p1.productID != $id 
						AND p1.cateID = (SELECT p.cateID FROM `product` p WHERE p.productID = $id) ORDER BY RAND() 
			LIMIT $limit");
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get special offers
	public function getRelatedProductsByCateID($cateID, $limit)
	{
		$data = array();
		$sql = "SELECT * FROM `product` WHERE `cateID` = $cateID ORDER BY RAND() LIMIT $limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get manufacturer name by product id
	public function getManuNameByProductId($id)
	{
		$data = array();
		$sql = "SELECT m.`name` FROM `product` p, `manufacturer` m WHERE p.manuID = m.manuID AND p.productID = $id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data[0]['name'];
	}

	// get manufacturer name by product id
	public function getCateNameByProductId($id)
	{
		$data = array();
		$sql = "SELECT c.`name` FROM `product` p, `category` c WHERE p.cateID = c.cateID AND p.productID = $id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data[0]['name'];
	}


	// get top newest products
	public function getNewestProducts($limit)
	{
		$data = array();
		$sql = "SELECT *, `name`, DAY(createAt) `dayCreate`, MONTH(createAt) `monthCreate`, YEAR(createAt) `yearCreate` FROM `product` ORDER BY `createAt` DESC LIMIT $limit";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get best salling
	public function getBestSellingProducts($limit)
	{
		$data = array();
		$sql = "SELECT * FROM (SELECT `productID`, SUM(`saleQuantity`) as `soldQuantity` FROM `order` o JOIN `order_detail` od on o.orderID = od.orderID  GROUP BY `productID` ORDER BY `soldQuantity` DESC LIMIT $limit) AS p1 JOIN `product` p ON p1.productID = p.productID";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	// get paging product
	public function getPagingProducts($limit, $cateID, $manuID, $orderBy, $itemsPerPage)
	{

		if ($orderBy == "low-to-high") {
			$orderBy = "`price`";
		} else if ($orderBy == "high-to-low") {
			$orderBy = "`price` DESC";
		} else if ($orderBy == "newest") {
			$orderBy = "`createAt` DESC";
		} else {
			$orderBy = "`productID`";
		}

		$sql = "";
		if ($manuID == 'no') {
			$sql = "SELECT * FROM `product` 
			WHERE `cateID` = '$cateID' ORDER BY $orderBy LIMIT $limit, $itemsPerPage";
		} else {
			$sql = "SELECT * FROM `product` 
			WHERE `cateID` = '$cateID' AND `manuID` = $manuID ORDER BY $orderBy LIMIT $limit, $itemsPerPage";
		}

		$data = array();
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function getSearchProducts($name, $cateID, $manuID, $price1, $price2)
	{
		$sql = "";
		if ($cateID == 'no' && $manuID == 'no' && $price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%'";
		} else if ($manuID == 'no' && $price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID'";
		} else if ($price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID' AND `manuID` = '$manuID'";
		} else if ($price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID' AND `manuID` = '$manuID'
			AND `price` <= '$price2' AND `price` >= '$price1'";
		} else if ($cateID == 'no' && $manuID == 'no' && $price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `price` <= '$price2' AND `price` >= '$price1'";
		} else if ($manuID == 'no' && $price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID` = '$cateID'
			AND `price` <= '$price2' AND `price` >= '$price1'";
		} else {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `manuID` = '$manuID'
			AND `price` <= '$price2' AND `price` >= '$price1'";
		}

		$data = array();
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}


	public function getPagingSearchProducts($name, $cateID, $manuID, $price1, $price2, $limit, $itemsPerPage)
	{
		$sql = "";
		if ($cateID == 'no' && $manuID == 'no' && $price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' LIMIT $limit, $itemsPerPage";
		} else if ($manuID == 'no' && $price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID' LIMIT $limit, $itemsPerPage";
		} else if ($price1 == 'no' && $price2 == 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID' AND `manuID` = '$manuID' LIMIT $limit, $itemsPerPage";
		} else if ($price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID`= '$cateID' AND `manuID` = '$manuID'
			AND `price` <= '$price2' AND `price` >= '$price1' LIMIT $limit, $itemsPerPage";
		} else if ($cateID == 'no' && $manuID == 'no' && $price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `price` <= '$price2' AND `price` >= '$price1' LIMIT $limit, $itemsPerPage";
		} else if ($manuID == 'no' && $price1 != 'no' && $price2 != 'no') {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `cateID` = '$cateID'
			AND `price` <= '$price2' AND `price` >= '$price1' LIMIT $limit, $itemsPerPage";
		} else {
			$sql = "SELECT * FROM `product` WHERE `name` LIKE '%$name%' AND `manuID` = '$manuID'
			AND `price` <= '$price2' AND `price` >= '$price1' LIMIT $limit, $itemsPerPage";
		}

		$data = array();
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function getManufacturerById($manuID)
	{
		$data = array();
		$sql = "SELECT * FROM `manufacturer` WHERE `manuID` = '$manuID'";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data[0];
	}
	// insert product
	public function insertProduct($cateID, $manuID, $name, $price, $quantity, $description, $image, $createAt)
	{
		$sql = ("INSERT 
				INTO `product` (`cateID`, `name`, `manuID`, `price`, `quantity`, `description`, `image`, `createAt`)
				VALUES('$cateID','$name','$manuID','$price','$quantity','$description','$image', '$createAt'");
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
	}

	// update product
	public function updateProduct(ProductDTO $product)
	{
		$sql = ("UPDATE `product`
				SET
					`name` = :name,
					`manuID` = :manuID,
					`quantity` = :quantity,
					`view` = :view,
					`createAt` = :createAt,
					`updateAt` = :updateAt, 
					`description` = :description,
					`cateID` = :cateID,
					`price` = :price,
					`image` = :image
				WHERE `productID` = :productID");

		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':name', $product->name);
		$stmt->bindParam(':manuID', $product->manuID);
		$stmt->bindParam(':quantity', $product->quantity);
		$stmt->bindParam(':view', $product->view);
		$stmt->bindParam(':createAt', $product->createAt);
		$stmt->bindParam(':updateAt', $product->updateAt);
		$stmt->bindParam(':description', $product->description);
		$stmt->bindParam(':cateID', $product->cateID);
		$stmt->bindParam(':price', $product->price);
		$stmt->bindParam(':image', $product->image);
		$stmt->bindParam(':productID', $product->productID);

		$stmt->execute();
	}

	public function searchProductsByName($name)
	{
		$data = array();
		$sql = "SELECT * FROM `product` WHERE name LIKE '%$name%'";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function getAllManufacturers()
	{
		$data = array();
		$sql = "SELECT * FROM `manufacturer`";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}

	public function deleteProductFromDB($proID)
	{
		$queryDelProductWithID = "DELETE FROM `product` WHERE `productID` = $proID";
		$stmt = $this->conn->query($queryDelProductWithID);

		$numRows = $stmt->rowCount();
		return $numRows > 0 ? true : false;
	}
}
