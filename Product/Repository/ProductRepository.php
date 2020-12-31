<?php 
    
    include('Helper/Helper.php');

    class ProductRepository {

        private $conn;

        public function __construct() {
            $this->conn = Connect();
        }

        public function getProducts() {
            $data = array();

            $sql = "SELECT * FROM `product`";
            $stmt = $this->conn->query($sql);
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data;
        }

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

        public function getManuNameByProductId($id) {
             $data = array();

            $sql = "SELECT m.`name` FROM product p, manufacturer m WHERE p.manuID = m.manuID AND p.productID = $id";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data[0];
        }

        public function insertProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view){
            $sql = "INSERT INTO product VALUES('$id','$cateID','$manuID','$price','$quantity','$description','$image','NULL','0','NULL')";
        }
    }
?>