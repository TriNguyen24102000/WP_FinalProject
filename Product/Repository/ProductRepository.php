<?php 
    //require('Helper/Helper.php');
    
    class ProductRepository {

        public $conn;
        
        // constructor
        public function __construct($conn) {
            $this->conn = $conn;
        }
        
        // get all products
        public function getAllProducts() {
            $data = array();

            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->query($sql);
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data;
        }

        // get all product by id
        public function getProductById($id) {
            $data = array();

            $sql = "SELECT * FROM `product` WHERE productID = $id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data[0];
        }

        // get all products by category id
        public function getProductsByCateId($cateID) {
            $data = array();

            $sql = "SELECT * FROM `product` WHERE cateID = $cateID";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data;
        }
        
        // get related product
        public function getRelatedProducts($id) {
            $data = array();

            $sql = "SELECT * FROM product p1 WHERE p1.productID != $id AND p1.cateID = (SELECT p.cateID FROM product p WHERE p.productID = $id) ORDER BY RAND() LIMIT 5";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data;
        }

        // get manufacturer name by product id
        public function getManuNameByProductId($id) {
             $data = array();

            $sql = "SELECT m.`name` FROM product p, manufacturer m WHERE p.manuID = m.manuID AND p.productID = $id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data[0]['name'];
        }

        // get manufacturer name by product id
        public function getCateNameByProductId($id) {
             $data = array();

            $sql = "SELECT c.`name` FROM product p, category c WHERE p.cateID = c.cateID AND p.productID = $id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data[0]['name'];
        }

        // insert product
        public function insertProduct($cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view, $productID = 'NULL'){
            $sql = "INSERT INTO product
                    VALUES('$productID','$cateID','$manuID','$price','$quantity','$description','$image','$createAt','$view','NULL')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        
        // update product
        public function updateProduct($product) {
            $sql = "UPDATE product
                    SET 
                        `name` = `{$product['name']}`,
                        `manuID` = `{$product['manuID']}`,
                        `quantity` = {$product['quantity']},
                        `view` = {$product['view']},
                        `createAt` = {$product['createAt']},
                        `updateAt` = {$product['updateAt']}, 
                        `description` = {$product['description']},
                        `cateID` = {$product['cateID']},
                        `price` = {$product['price']},
                        `image` = {$product['image']}
                    WHERE productID = {$product['productID']}";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
    }
?>