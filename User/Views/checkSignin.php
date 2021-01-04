<?php

    session_start();

    include_once('../Exception/UserNotFoundException.php');
    include_once('../Utils/functions.php');

    try
    {
        $userName = $_POST['userName'];
        $pwd = md5($_POST['password']);

        echo $userName . "---" . $pwd;

        if(isset($userName) && isset($pwd) && confirmAccount($userName, $pwd))
        {
            $role = getPermission($userName, $pwd);
            $userRole = $role['role'];

            if($userRole == 'admin')
                header('location: adminProfile.php');
            else
                header('location: user.php');

            $_SESSION['role'] = $userRole;
        }
    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
?>