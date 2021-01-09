<?php

    session_start();
    include(__DIR__ . '/../Service/ProductService.php');
    include('../../Category/Service/CategoryService.php');
    include('../../Manufacturer/Service/ManufacturerService.php');
    $cateService = new CategoryService(new CategoryRepo);
    $manuService = new ManufacturerService(new ManufacturerRepo);
    $productService = new ProductService(new ProductRepo);

    $categories = $cateService->getAllCategories();
    $manufacturers = $manuService->getAllManus();
    $products = $productService->getAllProducts();

    $productId = $_GET['proID'];
    $_SESSION['saveProID'] = $productId;

    $productMatchWithID = $productService->getProductById($productId);
?>

<!DOCTYPE html>
<html><head>
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="css/updateForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container right-panel-active" id="container">
                <form action="checkUpdateFormProduct.php" method="POST">
                    <h1 style="padding-top: 15px"> Product Profile </h1>
                    


                    <div>
                        <img src="../../images/<?php echo $productMatchWithID['image'] ?>" alt="Image" style="width: 2cm; height: 2cm;">
                        <label for="inputId" style="border: 1px solid gray;">file dialog</label>
                        <input id="inputId" type="file" style="position: fixed; top: -100em">
                    </div>
                    
                    <div>
                        <label>Name:   </label>
                        <input type="text" name="name" value="<?php echo $productMatchWithID['name']; ?>">
                    </div>

                    <div>
                        <label>Price</label>
                        <input type="text" name="price" value="<?php echo $productMatchWithID['price']; ?>">
                    </div>

                    <span>
                        <label>Quantity:  </label>
                        <input type="text" name="quantity" value="<?php echo $productMatchWithID['quantity']; ?>">
                    </span>
                    
                    <span>
                        <label>Description:   </label>
                        <textarea id="w3review" name="description" rows="2" cols="43"><?php echo $productMatchWithID['description'];?></textarea>                    
                    </span>

                    <br>
                    <span>
                    <label style="margin: 10px 2px 10px -233px;">Category</label>
                        <select name="cateID" id="cateID">
                            <?php foreach($categories as $category){ 
                                if($categories['productID'] == $productMatchWithID['productID'])
                                    echo "<option value= " . $category['cateID'] .  " selected= " . '"selected"' .  ">" . $category['name'] . "</option>"; 
                                else {
                            ?>
                                <option value="<?php echo $category['cateID'] ?>"><?php echo $category['name'] ?></option>
                            <?php } 
                                }?>
                        </select>
                    <span>

                    <br>
                    <span>
                    <label style="margin: 10px 2px 10px -200px;">Manufacturer</label>
                        <select name="manuID" id="manuID">
                            <?php foreach($manufacturers as $manufacturer){ 
                                if($manufacturer['manuID'] == $productMatchWithID['manuID'])
                                    echo "<option value= " . $manufacturer['manuID'] .  " selected= " . '"selected"' .  ">" . $manufacturer['name'] . "</option>"; 
                                else 
                                { 
                            ?>
                                <option value="<?php echo $manufacturer['manuID'] ?>"><?php echo $manufacturer['name'] ?></option>
                            <?php }
                                } ?>
                        </select>
                    <span>

                    <br><br>
                    <button type="submit" style="margin-top:5px" > Update</button>
                </form>
</script>

</body></html>
