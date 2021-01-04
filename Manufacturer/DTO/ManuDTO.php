<?php

    class ManuDTO
    {
        public $manuID;
        public $manuName;
        public $email;
        public $phone;
        public $createAt;
        public $updateAt;

        public function __construct($manuID, $name, $email, $phone, $createAt, $updateAt)
        {
            $this->manuID = $manuID;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->createAt = $createAt;
            $this->updateAt = $updateAt;
        }
    }

?>