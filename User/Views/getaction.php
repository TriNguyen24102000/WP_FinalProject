<?php

include_once(__DIR__ . '/../Utils/functions.php');
include_once(__DIR__ . '/../Service/UserService.php');
$user = new UserService(new UserRepo);
$userChoosen = $_GET['uid'];

dropFK();

$user->deleteUser($userChoosen);
header('location: adminProfile.php');
