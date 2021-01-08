<?php

    include_once('../Utils/functions.php');
    include_once('../Service/UserService.php');
    $userService = new UserService(new UserRepo);
    $userIDChoosen = $_GET['uid'];
    $action = $_GET['action'];

    if(isset($action))
    {
        if($action == "addUser")
        {

        }
        if($action == "deleteUser")
        {
            $userService->deleteUser($userIDChoosen);
            header('location: adminProfile.php?success=deleteSuccess');
            exit();
        }
        if($action == "updateUser")
        {
            header("location: updateForm.php?uid=$userIDChoosen");
        }
    }
?>