<?php


class Product
{
	public $productID;
	public $cateID;
	public $manuID;
	public $name;
	public $price;
	public $quantity;
	public $description;
	public $view;
	public $image;
	public $createAt;
	public $updateAt;

	public function __construct($productID, $cateID, $manuID, $name, $price, $quantity, $description, $view, $image, $createAt, $updateAt)
	{
		$this->productID = $productID;
		$this->cateID = $cateID;
		$this->manuID = $manuID;
		$this->name = $name;
		$this->price = $price;
		$this->quantity = $quantity;
		$this->description = $description;
		$this->view = $view;
		$this->image = $image;
		$this->createAt = $createAt;
		$this->updateAt = $updateAt;
	}
}


class ProductRepository
{
	public $conn;

	// constructor
	public function __construct($conn)
	{
		$this->conn = $conn;
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
		$sql = "SELECT * FROM `product` ORDER BY `createAt` DESC LIMIT $limit";
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
		$sql = "SELECT `productID`, `name`, `image`, `price`,SUM(`saleQuantity`) `quantity` FROM `order` o JOIN `order_detail` od WHERE o.orderID = od.orderID GROUP BY `productID` ORDER BY `saleQuantity` DESC LIMIT $limit";
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
			$sql = "SELECT * FROM `product` WHERE `cateID` = '$cateID' ORDER BY $orderBy LIMIT $limit, $itemsPerPage";
		} else {
			$sql = "SELECT * FROM `product` WHERE `cateID` = '$cateID' AND `manuID` = $manuID ORDER BY $orderBy LIMIT $limit, $itemsPerPage";
		}




		$data = array();
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
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
	public function updateProduct($product)
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
		$stmt->bindParam(':name', $product['name'], PDO::PARAM_STR);
		$stmt->bindParam(':manuID', $product['manuID']);
		$stmt->bindParam(':quantity', $product['quantity']);
		$stmt->bindParam(':view', $product['view']);
		$stmt->bindParam(':createAt', $product['createAt']);
		$stmt->bindParam(':updateAt', $product['updateAt']);
		$stmt->bindParam(':description', $product['description']);
		$stmt->bindParam(':cateID', $product['cateID']);
		$stmt->bindParam(':price', $product['price']);
		$stmt->bindParam(':image', $product['image']);
		$stmt->bindParam(':productID', $product['productID'], PDO::PARAM_INT);

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
}
