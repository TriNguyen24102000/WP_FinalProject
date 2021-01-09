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
            return $this->manuRepo->deleteManuFromDB($id);
        }

        public function updateManu(ManuDTO $manuDTO)
        {
            return $this->manuRepo->updateManuToDB($manuDTO);
        }
    }

?>