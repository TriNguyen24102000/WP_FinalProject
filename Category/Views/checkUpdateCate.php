<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
include_once(__DIR__ . '/../Service/CategoryService.php');

$cateService = new CategoryService(new CategoryRepo());

//get input and edited data
$name = $_POST['name'];
$cateID = $_POST['cateID'];
$updateTime = date("Y-m-d H:i:s");

if (isset($name)) {
  try {
    $cateService->updateCategory($cateID, $name, $updateTime);
    header('location: admin_category.php?updateStatus=success');
    exit();
  } catch (Exception $ex) {
    echo '<script> alert("Update Failed"); </script>';
    header('location: updateCate.php?cateID=' . $cateID);
    exit();
  }
}
