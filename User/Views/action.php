<?php

    include_once(__DIR__ . '/../Utils/functions.php');
    include_once(__DIR__ . '/../Service/UserService.php');
    $userService = new UserService(new UserRepo);
    $userIDChoosen = $_GET['uid'];
    $action = $_GET['action'];

    if(isset($action))
    {
        if($action == "deleteUser")
        {
            $userService->deleteUser($userIDChoosen);
            header('location: adminProfile.php?deleteStatus=success');
            exit();
        }
        if($action == "updateUser")
        {
            header("location: updateForm.php?uid=$userIDChoosen");
            exit();
        }
    }
?>