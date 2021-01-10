<?php

    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include_once(__DIR__ . '/../Service/ManufacturerService.php');

    $manuService = new ManufacturerService(new ManufacturerRepo);

    //get input and edited data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(isset($name) && isset($email) && isset($phone))
    {
        $nextManuID = getLastManuID() + 1;
        $createTime = date("Y-m-d H:i:s");
        $updateTime = date("Y-m-d H:i:s");

        $manuDTO = new ManuDTO($nextManuID, $name, $email, $phone, $createTime, $updateTime);

        $result = $manuService->insertManu($manuDTO);
        if($result == true)
        {
            header('location: admin_ManuList.php?insertStatus=success');
            exit();
        }           
        else
        {
            header('location: admin_ManuList.php?error=insertFailed');
            exit();
        }

    }

?>