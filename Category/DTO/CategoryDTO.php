<?php
class CategoryDTO
{
  public $cateID;
  public $name;
  public $createAt;
  public $updateAt;
  public function __construct($cateID, $name, $createAt, $updateAt)
  {
    $this->cateID = $cateID;
    $this->name = $name;
    $this->createAt = $createAt;
    $this->updateAt = $updateAt;
  }
}
