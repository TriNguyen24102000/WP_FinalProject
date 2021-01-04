<?php

    include_once('../Service/ManufacturerService.php');


    //get permission -> if admin -> handle it.


    //show manufacturer list.
    $manuService = new ManufacturerService(new ManufacturerRepo);
    $data = $manuService->getAllManus();

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php foreach($data as $manu): ?>

        <a href="manuDetail.php?manID=<?php echo $manu['manuID']; ?>">Click vao day de di den manu so <?php echo $manu['manuID']; ?>.</a><br>
        
        <button onclick="<?php $manuService->deleteManu($manu['manuID']); ?>">Bam vao day de xoa manu <?php echo $manu['manuID'];?></button>
        
    <?php endforeach; ?>

</body>
</html>