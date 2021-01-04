<?php

    include_once(__DIR__ . '/../Repository/ManufacturerRepo.php');

    class ManufacturerService
    {
        private $manuRepo;

        public function __construct(ManufacturerRepo $manuRepo)
        {
            $this->manuRepo = $manuRepo;
        }

        public function getAllManus()
        {
            return $this->manuRepo->getAllManus();
        }

        public function getManuByID($id)
        {
            return $this->manuRepo->getManuByID($id);
        }

        public function insertManu(ManuDTO $manuDTO)
        {
            return $this->manuRepo->insertManuToDB($manuDTO);
        }

        public function deleteManu($id)
        {
            // if($id > 0 && $id <= count($this->getAllManus()))
            // {
                echo "That's fine";
                // if($this->manuRepo->deleteManuFromDB($id) == true)
                // {
                //     echo "<script> alert('xoa duoc roi nha'); </script>";
                // }
                // else
                //     echo "<script> alert('khong the xoa duoc'); </script>";
            // }
            // else
                echo "<script> alert('Hello! I am an alert box!!'); </script>";
        }

        public function updateManu(ManuDTO $manuDTO)
        {
            return $this->manuRepo->updateManuToDB($manuDTO);
        }
    }

?>