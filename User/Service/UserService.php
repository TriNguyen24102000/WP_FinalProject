<?php

    include_once(__DIR__ . '/../Repository/UserRepo.php');

    class UserService
    {
        private $userRepo;

        public function __construct(UserRepo $userRepo)
        {
            $this->userRepo = $userRepo;
        }

        public function getAllUsers()
        {
            return $this->userRepo->getAllUsers();
        }

        public function getUserByID($id)
        {
            return $this->userRepo->getUserByID($id);
        }

        public function insertUser(UserDTO $userDTO)
        {
            return $this->userRepo->insertUserToDB($userDTO);
        }

        public function deleteUser($id)
        {
            return $this->userRepo->deleteUserFromDB($id);
        }

        public function updateUser(UserDTO $userDTO)
        {
            return $this->userRepo->updateUserToDB($userDTO);
        }
    }

?>