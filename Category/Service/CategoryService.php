<?php
include(__DIR__ . '/../Repository/CategoryRepo.php');



class CategoryService
{
  private $categoryRepo;

  public function __construct(CategoryRepo $categoryRepo)
  {
    $this->categoryRepo = $categoryRepo;
  }

  public function getAllCategories()
  {
    return $this->categoryRepo->getAllCategories();
  }

  public function getCategoryById($cateID)
  {
    return $this->categoryRepo->getCategoryById($cateID);
  }

  public function insertCategory($name)
  {
    return $this->categoryRepo->insertCategory($name);
  }

  public function updateCategory($cateID, $name, $updateAt)
  {
    return $this->categoryRepo->updateCategory($cateID, $name, $updateAt);
  }

  public function deleteCategory($cateID)
  {
    $this->categoryRepo->deleteCategory($cateID);
  }

  public function getCategoriesByName($name)
  {
    $this->categoryRepo->getCategoriesByName($name);
  }
}
