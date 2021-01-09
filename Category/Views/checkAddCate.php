<?php

session_start();
date_default_timezone_set("Asia/Kolkata");
include_once(__DIR__ . '/../Service/CategoryService.php');

$manuService = new CategoryService(new CategoryRepo());

//get input and edited data
$name = $_POST['name'];

if (isset($name)) {
  $createTime = date("Y-m-d H:i:s");
  $updateTime = date("Y-m-d H:i:s");
  try {
    $manuService->insertCategory($name);
    header('location: admin_category.php?insertStatus=success');
    exit();
  } catch (Exception $ex) {
    echo '<script> alert("' . $ex . '"); </script>';
    header('location: addCate.php');
    exit();
  }
}
