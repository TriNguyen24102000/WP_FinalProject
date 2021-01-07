<?php

class ProductDTO
{
  public $productID;
  public $cateID;
  public $manuID;
  public $name;
  public $price;
  public $quantity;
  public $description;
  public $view;
  public $image;
  public $createAt;
  public $updateAt;

  public function __construct($productID, $cateID, $manuID, $name, $price, $quantity, $description, $view, $image, $createAt, $updateAt)
  {
    $this->productID = $productID;
    $this->cateID = $cateID;
    $this->manuID = $manuID;
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->description = $description;
    $this->view = $view;
    $this->image = $image;
    $this->createAt = $createAt;
    $this->updateAt = $updateAt;
  }
}
