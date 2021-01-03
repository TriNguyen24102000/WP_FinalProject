<?php

include(__DIR__ . '/../Repository/ProductRepository.php');
class ProductService
{
	private $productRepo;

	public function __construct(ProductRepository $productRepo)
	{
		$this->productRepo = $productRepo;
	}

	public function getAllProducts()
	{
		return $this->productRepo->getAllProducts();
	}

	public function getProductsByCateId($cateID)
	{
		return $this->productRepo->getProductsByCateId($cateID);
	}

	public function getProductById($id)
	{
		return $this->productRepo->getProductById($id);
	}

	public function getSearchProducts($name, $cateID, $manuID, $price1, $price2)
	{
		return $this->productRepo->getSearchProducts($name, $cateID, $manuID, $price1, $price2);
	}

	public function getPagingSearchProducts($name, $cateID, $manuID, $price1, $price2, $limit, $itemsPerPage)
	{
		return $this->productRepo->getPagingSearchProducts($name, $cateID, $manuID, $price1, $price2, $limit, $itemsPerPage);
	}

	public function getRelatedProducts($id, $limit)
	{
		return $this->productRepo->getRelatedProducts($id, $limit);
	}

	public function getManuNameByProductId($id)
	{
		return $this->productRepo->getManuNameByProductId($id);
	}

	public function getCateNameByProductId($id)
	{
		return $this->productRepo->getCateNameByProductId($id);
	}

	public function getBestSellingProducts($limit)
	{
		return $this->productRepo->getBestSellingProducts($limit);
	}

	public function getNewestProducts($limit)
	{
		return $this->productRepo->getNewestProducts($limit);
	}

	public function getPagingProducts($limit, $cateID, $manuID = 'no', $orderBy = 'no', $itemsPerPage = 6)
	{
		return $this->productRepo->getPagingProducts($limit, $cateID, $manuID, $orderBy, $itemsPerPage);
	}

	public function updateProduct($product)
	{
		return $this->productRepo->updateProduct($product);
	}

	public function getRelatedProductsByCateID($cateID, $limit = 10)
	{
		return $this->productRepo->getRelatedProductsByCateID($cateID, $limit);
	}

	public function insertProduct($cateID, $manuID, $name, $price, $quantity, $description, $image, $createAt)
	{
		return $this->productRepo->insertProduct($cateID, $manuID, $name, $price, $quantity, $description, $image, $createAt);
	}

	public function getManufacturerById($manuID)
	{
		return $this->productRepo->getManufacturerById($manuID);
	}

	public function searchProductsByName($name)
	{
		return $this->productRepo->searchProductsByName($name);
	}

	public function getAllManufactures()
	{
		return $this->productRepo->getAllManufacturers();
	}
}
