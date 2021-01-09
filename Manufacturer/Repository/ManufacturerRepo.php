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
            $sql = "INSERT INTO `manufacturer`(`manuID`, `name`, `email`, `phone`, `createAt`, `updateAt`) VALUES (:manuID, :name, :email, :phone, :createAt, :updateAt)";
            $stmt = Connect()->prepare($sql);

            $stmt->bindValue(':manuID', $manuDTO->manuID);
            $stmt->bindValue(':name', $manuDTO->name);
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

        public function deleteManuFromDB($manuID)
        {
            $queryDelProductContainManu = "DELETE FROM `product` WHERE `manuID` = $manuID";
            $queryDelManu = "DELETE FROM `manufacturer` WHERE `manuID` = $manuID";
            
            $stmt_1 = Connect()->query($queryDelProductContainManu);
            $stmt_2 = Connect()->query($queryDelManu);
            
            $numRow = $stmt_2->rowCount();

            return $numRow > 0 ? true : false;
        }

        public function updateManuToDB(ManuDTO $manuDTO)
        {

            $sql = "UPDATE `manufacturer` SET `name`= :name, `email`= :email, `phone` = :phone, `createAt`= :createAt, `updateAt` = :updateAt WHERE `manuID` = :manuID";                        
            $stmt = Connect()->prepare($sql);

            $stmt->bindValue(':manuID', $manuDTO->manuID);
            $stmt->bindValue(':name', $manuDTO->name);
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
