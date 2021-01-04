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

?>