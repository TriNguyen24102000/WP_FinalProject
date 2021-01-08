<?php
    date_default_timezone_set("Asia/Kolkata");
    include_once('../Utils/functions.php');

    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];

    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $dob = date("Y-m-d H:i:s", $dob_year . "-" . $dob_month . "-" . $dob_year);


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
                    header('location: signup.php?success=createSuccess');
                }
                else
                    header('location: signup.php?error=createAccountFailed');
            }
        }
    }
?>