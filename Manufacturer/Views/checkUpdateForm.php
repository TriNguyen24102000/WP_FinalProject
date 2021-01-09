<?php

    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include_once(__DIR__ . '/../Utils/functions.php');
    include_once(__DIR__ . '/../Service/ManufacturerService.php');

    $manuService = new ManufacturerService(new ManufacturerRepo);

    //get input and edited data
    $manuID = $_SESSION['saveManuID'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(isset($name) && isset($email) && isset($phone))
    {
        $data = $manuService->getManuByID($manuID);
        $updateTime = date("Y-m-d H:i:s");

        $manuDTO = new ManuDTO($manuID, $name, $email, $phone, $data['createAt'], $updateTime);

        $result = $manuService->updateManu($manuDTO);
        if($result == true)
        {
            header('location: admin_ManuList.php?updateStatus=success');
            exit();
        }           
        else
        {
            header('location: admin_ManuList.php?error=updateFail');
            exit();
        }

    }

?>