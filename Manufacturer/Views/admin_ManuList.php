<?php

    include_once(__DIR__ . '/../Service/ManufacturerService.php');

    $manmanuvice = new ManufacturerService(new ManufacturerRepo);
    $data = $manmanuvice->getAllManus();
    $index = 1;
?>

<?php

  if(isset($_GET['insertStatus']))
  {
    if($_GET['insertStatus'] == "success")
      echo "<script>alert('Insert Success');</script>";
  }

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
    <title>Manufacturer Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
    <div class="row">
  				<div class="col-md-6">
  					<div class="content-box-large">
		  				<div class="panel-heading">
                            <h1>Quản lý Nhà Cung Cấp</h1>
                        </div>
                            <div>
                            <a id="add" href="action.php?action=addManu">
                                <label>Thêm</label>
                                <img  style="width: 0.7cm; height: 0.7cm" src="Images/plus.png" alt="Add"></a>
                            </div>
		  				<div class="panel-body">
		  					<table class="table">
				              <thead>
				                <tr>
				                  <th>Number</th>
				                  <th>Name</th>
								          <th>Email</th>
				                  <th>Phone</th>
				                </tr>
				              </thead>
				              <tbody>

									  
                                    <?php foreach($data as $manu): ?> 
                                            <tr>
                                                <td><?php echo $index++?></td>
                                                <td><?php echo $manu['name'];?></td>
												                        <td><?php echo $manu['email'];?></td>
                                                <td><?php echo $manu['phone'];?></td>

                                                <td><a href="action.php?action=deleteManu&manID=<?php echo $manu['manuID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/trash.png" alt="Delete"></a></td>
                                                <td><a href="action.php?action=updateManu&manID=<?php echo $manu['manuID']; ?>"><img style="width: 0.5cm; height: 0.5cm" src="Images/edit.png" alt="Update"></a></td>
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