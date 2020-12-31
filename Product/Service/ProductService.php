<?php

    include_once('Repository/ProductRepository.php');

    class ProductService {
        private $productRepo;

        public function __construct(ProductRepository $productRepo) {
            $this->productRepo = $productRepo;
        }

        public function getAllProducts() {
            return $this->productRepo->getProducts();
        } 
        
        public function getProductById($id) {
            return $this->productRepo->getProductById($id);
        } 

        public function getRelatedProducts($id) {
            return $this->productRepo->getRelatedProducts($id);
        }
    }

?>