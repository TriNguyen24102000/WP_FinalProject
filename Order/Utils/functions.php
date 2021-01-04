<?php

    function Connect()
    {
        $host = 'localhost';
        $dbname = 'ecommerce';
        $username = 'root';
        $password = '';

        try
        {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
    }

    function getTotalPrice()
    {
        $sql = "SELECT * FROM `order_detail` JOIN `order` ON `order_detail`.orderID = `order`.orderID JOIN `product` ON `order_detail`.productID = `product`.productID";
        $stmt = Connect()->query($sql);

        $sum = 0;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $sum += ($row['price'] * $row['saleQuantity']);
        }
        return $sum;
    }

?>