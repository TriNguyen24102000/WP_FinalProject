<?php
    date_default_timezone_set("Asia/Kolkata");
    include_once(__DIR__.'/../Utils/functions.php');

    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if(isCorrectSignupFormat($userName, $password, $fullName, $email, $address, $dob, $phone) == false 
            && isEmpty($userName) || isEmpty($password) || isEmpty($confirmPassword) || isEmpty($fullName) || isEmpty($email) || isEmpty(($dob)
            || isEmpty($address) || isEmpty($phone)))
    {
        header('location: signup.php?error=signupeemptyField');
        exit();
    }        
    else
    {
        if(isEqualsPassword($password, $confirmPassword) == false)
        {
            header('location: signup.php?error=passwordConfirmIncorrect');
            exit();
        }
        else
        {
            if(strlen($phone) != 11)
            {
                header('location: signup.php?error=invalidVietNamePhone');
                exit();
            }
            else
            {
                $userService = new UserService(new UserRepo);

                $userTemp = getLastUserID();
                $nextUserID = $userTemp['userID'] + 1;
        
                $createAt = date("Y-m-d H:i:s");
                $updateAt = date("Y-m-d H:i:s");
        
        
                $user = new UserDTO($nextUserID, $userName, $fullName, md5($password), $email,  $dob, $phone, $address, $createAt, 
                                            $updateAt);
        
                $result = $userService->insertUser($user);
        
                if($result > 0)
                {
                    echo "<script>Create Account Success!!</script>";
                    header('location: login.php');
                }
                else
                    echo "<script>Create Account Fail!!</script>";
            }
        }
    }
