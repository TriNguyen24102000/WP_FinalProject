<?php

    include_once('../Utils/functions.php');
    include_once('../DTO/ManuDTO.php');

    class ManufacturerRepo
    {
        public function getAllManus()
        {
            $data = array();
            $sql = "SELECT * FROM `manufacturer`";
            $stmt = Connect()->query($sql);

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }

            return $data;
        }

        public function getManuByID($id)
        {
            $sql = "SELECT * FROM `manufacturer` WHERE `manuID` = :manuID";
            $stmt = Connect()->prepare($sql);
            $stmt->bindValue(':manuID', $id);

            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertManuToDB(ManuDTO $manuDTO)
        {
            //insert normal user -> role ID = 1;
            

            $sql = "INSERT INTO `manufacturer`(`name`, `email`, `phone`, `createAt`, `updateAt`) VALUES (:manuname, :email, phone, :createAt, :updateAt)";
            $stmt = Connect()->prepare($sql);

            $stmt->bindValue(':manuname', $manuDTO->manuName);
            $stmt->bindValue(':email', $manuDTO->email);
            $stmt->bindValue(':phone', $manuDTO->phone);
            $stmt->bindValue(':createAt', $manuDTO->createAt);
            $stmt->bindValue(':updateAt', $manuDTO->updateAt);

            $stmt->execute();

            $numRow = $stmt->rowCount();

            if($numRow > 0)
                return true;
            return false;
        }

        public function deleteManuFromDB($id)
        {
            $sql = "DELETE FROM `manufacturer` WHERE `manuID` = :manuID";
            
            $stmt = Connect()->prepare($sql);
            $stmt->bindValue(':manuID', $id);

            $stmt->execute();

            $numRow = $stmt->rowCount();

            return $numRow > 0 ? true : false;
        }

        public function updateManuToDB(ManuDTO $manuDTO)
        {

            $sql = "UPDATE `manufacturer` SET `name`= :manuName, `email`= :email, `phone` = :phone, `createAt`= :createAt, `updateAt` = :updateAt WHERE `manuID` = :manuID";                        
            $stmt = Connect()->prepare($sql);

            $stmt->bindValue(':manuID', $manuDTO->manuID);
            $stmt->bindValue(':manuName', $manuDTO->manuName);
            $stmt->bindValue(':email', $manuDTO->email);
            $stmt->bindValue(':phone', $manuDTO->phone);
            $stmt->bindValue(':createAt', $manuDTO->createAt);
            $stmt->bindValue(':updateAt', $manuDTO->updateAt);

            $stmt->execute();

            $numRow = $stmt->rowCount();

            return $numRow > 0 ? true : false;
        }
    }

?>
