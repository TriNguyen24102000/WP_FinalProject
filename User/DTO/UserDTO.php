<?php

    class UserDTO
    {
        public $userID;
        public $userName;
        public $password;
        public $fullName;
        public $email;
        public $dob;
        public $phone;
        public $address;
        public $createAt;
        public $updateAt;

        public function __construct($userID, $userName, $fullName, $password, $email, $dob, $phone, $address, $createAt, $updateAt)
        {
            $this->userID = $userID;
            $this->userName = $userName;     
            $this->password = $password;           
            $this->fullName = $fullName;   
            $this->email = $email;     
            $this->dob = $dob;
            $this->phone = $phone;            
            $this->address = $address;  
            $this->createAt = $createAt;
            $this->updateAt = $updateAt;         
        }
    }

?>