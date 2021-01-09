<?php

include_once(__DIR__ . '/../Service/CategoryService.php');

$manuService = new CategoryService(new CategoryRepo());
$action = $_GET['action'];
$manuID = $_GET['cateID'];

if (isset($_GET['action'])) {
  if ($_GET['action'] == "addCate") {
    header("location: addCate.php");
    exit();
  }

  if ($_GET['action'] == "deleteCate") {
    $manuService->deleteCategory($manuID);

    header('location: admin_category.php?deleteStatus=success');
    exit();
  }

  if ($_GET['action'] == "updateManu") {
    header("location: updateCate.php?cateID=$manuID");
    exit();
  }
}
