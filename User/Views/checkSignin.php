<?php

    session_start();

    include_once('../Utils/functions.php');

    try
    {
        $userName = $_POST['userName'];
        $pwd = $_POST['password'];


        if(isEmpty($userName) || isEmpty($pwd))
        {
            header('location: login.php?error=emptyField');
            exit();
        }
        else
        {
            $hashPwd = md5($pwd);
            if(confirmAccount($userName, $hashPwd) == false)
            {
                header('location: login.php?error=wrongLogin');
                exit();
            }
            else
            {
                $role = getPermission($userName, $hashPwd);
                $userRole = $role['role'];

                if($userRole == 'admin')
                {
                    $_SESSION["userID"] = $userName;
                    header('location: adminProfile.php');
                    exit();

                }
                else
                    header('location: user.php');

                $_SESSION['role'] = $userRole;
            }
        }
    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
?>