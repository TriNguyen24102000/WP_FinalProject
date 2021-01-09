<?php

    include_once(__DIR__ . '/../Service/ManufacturerService.php');

    $manuService = new ManufacturerService(new ManufacturerRepo);
    $action = $_GET['action'];
    $manuID = $_GET['manID'];

    if(isset($_GET['action']))
    {
        if($_GET['action'] == "addManu")
        {
            header("location: addManuForm.php");
            exit();
        }
        
        if($_GET['action'] == "deleteManu")
        {
            $manuService->deleteManu($manuID);
            
            header('location: admin_ManuList.php?deleteStatus=success');
            exit();
        }

        if($_GET['action'] == "updateManu")
        {
            header("location: updateManuForm.php?manuID=$manuID");
            exit();
        }
        
    }

?>