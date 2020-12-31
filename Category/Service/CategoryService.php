<?php 
    include_once('Repository/CategoryRepository.php');

    class CategoryService {
        private $categoryRepo;

        public function __construct($categoryRepo) {
            $this->categoryRepo = $categoryRepo;
        }

        public function getAllCategories() {
           return $this->categoryRepo->getAllCategories();
        }

        public function getCategoryById($cateID) {
            return $this->categoryRepo->getCategoryById($cateID);
        }

        public function insertCategory($name, $createAt = '', $updateAt = '') {
            return $this->categoryRepo->insertCategory($name, $createAt, $updateAt);
        }

        public function updateCategory($cateID, $name, $createAt, $updateAt = '') {
            return $this->categoryRepo->updateCategory($cateID, $name, $createAt, $updateAt);
        }

        public function deleteCategory($cateID) {
            $this->categoryRepo->deleteCategory($cateID);
        }

        public function getCategoriesByName($name) {
            $this->categoryRepo->getCategoriesByName($name);
        }
    }

?>