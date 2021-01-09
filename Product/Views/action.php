<?php

    include_once(__DIR__ . '/../Service/ProductService.php');

    $productService = new ProductService(new ProductRepo);
    $action = $_GET['action'];
    $proID = $_GET['proID'];

    if(isset($_GET['action']))
    {   
        if($_GET['action'] == "deleteProduct")
        {
            $productService->deleteProduct($proID);
            
            header('location: admin_product.php?deleteStatus=success');
            exit();
        }

        if($_GET['action'] == "updateProduct")
        {
            header("location: updateProductForm.php?proID=$proID");
            exit();
        }    
    }
?>