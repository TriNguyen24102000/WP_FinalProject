<?php

    include_once('../Utils/functions.php');
    
    class OrderRepo
    {
        public function getAllOrders()
        {
            try
            {
                $sql = "SELECT * FROM `order_detail` JOIN `order` ON `order_detail`.orderID = `order`.orderID JOIN `product` ON `order_detail`.productID = `product`.productID";
                $stmt = Connect()->query($sql);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $data[] = $row;
                }

                return $data;
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
            }
        }

        public function getOrderByID($id)
        {
            try
            {
                $sql = "SELECT * FROM `order` WHERE orderID = :orderID";
                $stmt = Connect()->prepare($sql);
                $stmt->bindValue(":orderID", $id);

                $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);

            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
            }
        }

        public function getLastOrderID()
        {
            $sql = "SELECT `ordID` FROM `order` ORDER BY `ordID` DESC LIMIT 1";
            $stmt = Connect()->query($sql);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function insertOrderToDB(OrderDTO $orderDTO)
        {
            //insert normal user -> role ID = 1;
            $order = $this->getLastOrderID();
            $nextOrderID = $order['ordID'] + 1;
            $sql = "INSERT INTO `order`(`orderID`, `userID`, `createAt`, `totalPrice`, `updateAt`) VALUES ($nextOrderID, :userID, :totalPrice, :createAt, :updateAt)";

            $stmt = Connect()->prepare($sql);
            $stmt->bindValue(':userID', $orderDTO->userID);      //combobox
            $stmt->bindValue(':addr', $orderDTO->totalPrice);
            $stmt->bindValue(':createAt', $orderDTO->createAt);
            $stmt->bindValue(':updateAt', $orderDTO->updateAt);

            $stmt->execute();

            $numRow = $stmt->rowCount();

            if($numRow > 0)
                return true;
            return false;
        }

        public function deleteOrderFromDB($id)
        {
            $sql = "DELETE `order` WHERE orderID = :orderID";
            
            $stmt = Connect()->prepare($sql);
            $stmt->bindValue('order', $id);

            $stmt->execute();

            $numRow = $stmt->rowCount();

            return $numRow > 0 ? true : false;
        }

        public function updateOrder(OrderDTO $orderDTO)
        {

            $sql = "UPDATE `order` SET userID = :userID,
                                       totalPrice = :totalPrice,
                                       createAt = :createAt,
                                       updateAt = :updateAt";

            $stmt = Connect()->prepare($sql);
            $stmt->bindValue(':userID', $orderDTO->userID);
            $stmt->bindValue(':totalPrice', $orderDTO->totalPrice);
            $stmt->bindValue(':createAt', $orderDTO->createAt);
            $stmt->bindValue(':updateAt', $orderDTO->updateAt);

            $numRow = $stmt->rowCount();

            return $numRow > 0 ? true : false;
        }
    }

?>