<?php 
    include_once('Helper/Helper.php');

    class CategoryRepository {
        private $conn;

        public function __contruct() {
            $this->conn = Connect();
        }
        // get all categories
        public function getAllCategories() {
            $data = array();
            $sql = "SELECT * FROM `category`";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }

        // get category by id
        public function getCategoryById($cateId) {
            $data = array();
            $sql = "SELECT * FROM `category` WHERE `cateID`= $id";
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
        public function updateCategory($cateID, $name, $createAt, $updateAt) {
            $sql = "UPDATE `category` 
                    SET `cateID` = '$cateID',
                        `name` = '$name',
                        `createAt` = '$createAt',
                        `updateAt` = '$updateAt'
                    WHERE `cateID` = $cateID";
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