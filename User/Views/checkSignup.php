<?php
    date_default_timezone_set("Asia/Kolkata");
    include_once('../Utils/functions.php');

    $userName = $_GET['userName'];
    $password = md5($_GET['password']);
    $confirmPassword = md5($_GET['confirmPassword']);
    $fullName = $_GET['fullName'];
    $email = $_GET['email'];
    $dob = $_GET['dob'];
    $address = $_GET['address'];
    $phone = $_GET['phone'];
    
    if(isCorrectSignupFormat($userName, $password, $fullName, $email, $address, $dob, $phone) && 
            isEqualsPassword($password, $confirmPassword))
    {

        $userService = new UserService(new UserRepo);

        $userTemp = getLastUserID();
        $nextUserID = $userTemp['userID'] + 1;

        $createAt = date("Y-m-d H:i:s");
        $updateAt = date("Y-m-d H:i:s");


        $user = new UserDTO($nextUserID, $userName, $fullName, $password, $email,  $dob, $phone, $address, $createAt, 
                                    $updateAt);

        $result = $userService->insertUser($user);

        if($result > 0)
        {
            header('location: login.php');
        }        
        else
            echo "insert fail!!";

        //done
    }


?>