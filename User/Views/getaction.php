<?php

    include_once('../Utils/functions.php');
    include_once('../Service/UserService.php');
    $user = new UserService(new UserRepo);
    $userChoosen = $_GET['uid'];
    
    dropFK();

    $user->deleteUser($userChoosen);
    header('location: adminProfile.php');

?>