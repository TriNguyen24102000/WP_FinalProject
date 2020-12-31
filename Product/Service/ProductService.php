<?php

    include_once('Repository/ProductRepository.php');

    class ProductService {
        private $productRepo;

        public function __construct(ProductRepository $productRepo) {
            $this->productRepo = $productRepo;
        }

        public function getAllProducts() {
            return $this->productRepo->getAllProducts();
        } 
        
        public function getProductsByCateId($cateID) {
            return $this->productRepo->getProductsByCateId($cateID);
        }

        public function getProductById($id) {
            return $this->productRepo->getProductById($id);
        } 

        public function getRelatedProducts($id) {
            return $this->productRepo->getRelatedProducts($id);
        }

        public function getManuNameByProductId($id) {
            return $this->productRepo->getManuNameByProductId($id);
        }

        public function getCateNameByProductId($id) {
            return $this->productRepo->getCateNameByProductId($id);
        }

        public function updateProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view, $updateAt){
            return $this->productRepo->updateProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view, $updateAt);
        }

        public function insertProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view){
            return $this->productRepo->insertProduct($id, $cateID, $manuID, $name, $price,$quantity,$description,$image,$createAt, $view);
        }
    }

?>