<?php

    include_once(__DIR__ . '/../Service/ProductService.php');

    $productService = new ProductService(new ProductRepo);
    $data = $productService->getAllProducts();
    $index = 1;
?>

<?php

  if(isset($_GET['deleteStatus']))
  {
    if($_GET['deleteStatus'] == "success")
      echo "<script>alert('Delete Success');</script>";
  }

  if(isset($_GET['updateStatus']))
  {
    if($_GET['updateStatus'] == "success")
      echo "<script>alert('Update Success);</script>";
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
                            <h1>Quản lý Sản Phẩm</h1>
                        </div>

		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>Number</th>
				                  <th>Image</th>
				                  <th>Name</th>
								  <th>Price</th>
				                  <th>Quantity</th>
				                  <th>Description</th>
                                  <th>Views</th>
				                </tr>
				              </thead>
				              <tbody>

									  
                                    <?php foreach($data as $product): ?> 
                                            <tr>
                                                <td><?php echo $index++?></td>
                                                <td><img src="../../images/<?php echo $product['image'];?>" alt="Image" style="width: 2cm; height: 2cm"></td>
                                                <td><?php echo $product['name'];?></td>
												<td><?php echo $product['price'];?></td>
                                                <td><?php echo $product['quantity'];?></td>
                                                <td><?php echo $product['description'];?></td>
                                                <td><?php echo $product['view'];?></td>


                                                <td><a href="action.php?action=deleteProduct&proID=<?php echo $product['productID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/trash.png" alt="Delete"></a></td>
                                                <td><a href="action.php?action=updateProduct&proID=<?php echo $product['productID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/edit.png" alt="Update"></a></td>
                                            </tr>
                                    <?php endforeach;?>
				                </tr>
				              </tbody>
				            </table>
		  				</div>
		  			</div>
                  </div>

</body>
</html>