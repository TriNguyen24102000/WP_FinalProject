<?php 
    //require('Helper/Helper.php');
    
    class CategoryRepository {

        public $conn;
        
        // constructor
        public function __construct($conn) {
            $this->conn = $conn;
        }
        
        // get all products
        public function getAllCategories() {
            $data = array();

            $sql = "SELECT * FROM `category`";
            $stmt = $this->conn->query($sql);
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row; 
            }

            return $data;
        }
        
        // get category by id
        public function getCategoryById($cateID) {
            $data = array();
            $sql = "SELECT * FROM `category` WHERE `cateID`= $cateID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $data[] = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data[0];
        }

        // insert category
        public function insertCategory($name, $createAt, $updateAt) {
            $sql = "INSERT INTO `category` 
                    VALUES('','$name', '$createAt', '$updateAt')";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

        // update category
        public function updateCategory($category) {
            $sql = "UPDATE `category` 
                    SET `cateID` = '{$category["cateID"]}',
                        `name` = '{$category["name"]}',
                        `createAt` = '{$category["createAt"]}',
                        `updateAt` = '{$category["updateAt"]}'
                    WHERE `cateID` = '{$category["cateID"]}'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

        // delete category
        public function deleteCategory($cateID) {
            $sql = "DELETE `category` WHERE `cateID` = $cateID";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

        // get categories by name
        public function getCategoriesByName($name) {
            $sql = "SELECT * FROM `category` WHERE `name` LIKE '$name%'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $data = array();
            $data[] = $stmt->fetch(PDO::FETCH_ASSOC);
            return $data[0];
        }
    }
?>