<?php 
    
    include('Helper/Helper.php');

    class ProductRepository {

        private $conn;
        // constructor
        public function __construct() {
            $this->conn = Connect();
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

            return $data;
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

            $sql = "SELECT * FROM product p1 WHERE p1.productID != $id AND p1.cateID = (SELECT p.cateID FROM product p WHERE p.productID = $id) ORDER BY RAND() LIMIT 3";
            
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
        public function insertProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view){
            $sql = "INSERT INTO product
                    VALUES('$id','$cateID','$manuID','$price','$quantity','$description','$image','$createAt','$view','NULL')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        
        // update product
        public function updateProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view, $updateAt) {
            $sql = "UPDATE product
                    SET `productID` ='$id',
                        `name` ='$name',
                        `manuID` ='$manuID',
                        `quantity` ='$quantity',
                        `view` ='$view',
                        `createAt` ='$createAt',
                        `updateAt` ='$updateAt', 
                        `description` ='$description',
                        `cateID` ='$cateID',
                        `price` ='$price',
                        `image` ='$image'
                    WHERE productID = '$id'";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
    }
?>