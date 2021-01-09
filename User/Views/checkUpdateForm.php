<?php 
    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include_once(__DIR__ . '/../Utils/functions.php');
    include_once(__DIR__ . '/../Service/UserService.php');

    $userService = new UserService(new UserRepo);

    //get input and edited data
    $userID = $_SESSION['saveUID'];
    $name = $_POST['name'];
    $userName = $_POST['username'];
    $email = $_POST['email'];
    $dob_day = $_POST['dob_day'];
    $dob_month = $_POST['dob_month'];
    $dob_year = $_POST['dob_year'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    if(isset($name) && isset($userName) && isset($email) && isset($email) && isset($address) && isset($phone))
    {
        $data = $userService->getUserByID($userID);
        $updateTime = date("Y-m-d H:i:s");
        $dob = $dob_year . "-" . $dob_month . "-" . $dob_day;

        $userDTO = new UserDTO($userID, $userName, $name, $data['password'], $email, $dob, $phone, $address, $data['createAt'], $updateTime);

        $result = $userService->updateUser($userDTO);
        if($result == true)
        {
            header('location: adminProfile.php?updateStatus=success');
            exit();
        }           
        else
        {
            header('location: adminProfile.php?error=updateFail');
            exit();
        }

    }


?>