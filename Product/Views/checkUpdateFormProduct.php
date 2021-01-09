<?php

    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include_once(__DIR__ . '/../Utils/functions.php');
    include_once(__DIR__ . '/../Service/ProductService.php');

    $productService = new ProductService(new ProductRepo);

    //get input and edited data
    $proID = $_SESSION['saveProID'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $cateID = $_POST['cateID'];
    $manuID = $_POST['manuID'];

    if(isset($name) && isset($price) && isset($quantity) && isset($description))
    {
        $updateTime = date("Y-m-d H:i:s");
        $product = $productService->getProductById($proID);
        
        $productDTO = new ProductDTO($proID, $cateID, $manuID, $name, $price, $quantity, $description, $product['view'], $product['image'], $product['createAt'], $updateTime);
        // echo $product['view'] . "<br>";
        // echo $product['createAt'] . "<br>";
        // echo $product['image'];
        $result = $productService->updateProduct($productDTO);
        if($result == true)
        {
            header('location: admin_product.php?updateStatus=success');
            exit();
        }           
        else
        {
            header('location: admin_product.php?error=updateFail');
            exit();
        }

    }

?>