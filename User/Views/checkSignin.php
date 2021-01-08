<?php

    session_start();
    include_once('../Service/UserService.php');
    $userService = new UserService(new UserRepo);
    $users = $userService->getAllUsers();

    try
    {
        $userName = $_POST['userName'];
        $pwd = $_POST['password'];
        $userMatch = null;

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
                $userWithCorrespondUserName = getIDByUserName($users, $userName);
                
                //initialize SESSION.
                $_SESSION['role'] = $userRole;
                $_SESSION['uid'] = $userWithCorrespondUserName;

                if($userRole == 'admin')
                {
                    $_SESSION["userID"] = $userName;
                    header('location: adminProfile.php');
                    exit();

                }
                else
                    //nav to product
                    header('location: userDetail.php');

                
                
                
            }
        }
    }
    catch(Exception $ex)
    {
        echo $ex->getMessage();
    }
?>