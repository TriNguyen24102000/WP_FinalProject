<?php

    include_once(__DIR__ . '/../Utils/functions.php');
    include_once(__DIR__ . '/../DTO/ManuDTO.php');

    class ManufacturerRepo
    {
        public function getAllManus()
        {
            $data = array();
            $sql = "SELECT * FROM `manufacturer`";
            $stmt = ManufacturerConnect()->query($sql);

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
                $data[] = $row;
            }

            return $data;
        }

        public function getManuByID($id)
        {
            $sql = "SELECT * FROM `manufacturer` WHERE `manuID` = :manuID";
            $stmt = ManufacturerConnect()->prepare($sql);
            $stmt->bindValue(':manuID', $id);

            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertManuToDB(ManuDTO $manuDTO)
        {
            $sql = "INSERT INTO `manufacturer`(`manuID`, `name`, `email`, `phone`, `createAt`, `updateAt`) VALUES (:manuID, :name, :email, :phone, :createAt, :updateAt)";
            $stmt = ManufacturerConnect()->prepare($sql);

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
            $queryDelOrderDetail = "DELETE FROM `order_detail` WHERE `productID` IN (SELECT p.`productID` from `product` p JOIN `order_detail` od ON p.`productID` = od.`productID` WHERE p.`manuID` = $manuID)";
            $queryDelProductContainManu = "DELETE FROM `product` WHERE `manuID` = $manuID";
            $queryDelManu = "DELETE FROM `manufacturer` WHERE `manuID` = $manuID";
            
            //perform
            $stmt_1 = ManufacturerConnect()->query($queryDelOrderDetail);
            $stmt_2 = ManufacturerConnect()->query($queryDelProductContainManu);
            $stmt_3 = ManufacturerConnect()->query($queryDelManu);
            
            $numRow = $stmt_3->rowCount();

            return $numRow > 0 ? true : false;
        }

        public function updateManuToDB(ManuDTO $manuDTO)
        {

            $sql = "UPDATE `manufacturer` SET `name`= :name, `email`= :email, `phone` = :phone, `createAt`= :createAt, `updateAt` = :updateAt WHERE `manuID` = :manuID";                        
            $stmt = ManufacturerConnect()->prepare($sql);

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
