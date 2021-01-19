<?php

include_once(__DIR__ . '/../Service/CategoryService.php');

$cateService = new CategoryService(new CategoryRepo());
$action = $_GET['action'];
$cateID = $_GET['cateID'];

if (isset($_GET['action'])) {
  if ($_GET['action'] == "addCate") {
    header("location: addCate.php");
    exit();
  }

  if ($_GET['action'] == "deleteCate") {
    $cateService->deleteCategory($cateID);

    header('location: admin_category.php?deleteStatus=success');
    exit();
  }

  if ($_GET['action'] == "updateCate") {
    header("location: updateCate.php?cateID=$cateID");
    exit();
  }
}
