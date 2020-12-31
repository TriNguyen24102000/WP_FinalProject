<?php

    function Connect()
    {
        $host = 'localhost';
        $dbname = 'ecommerce';
        $username = 'root';
        $password = 'trung1234';

        try
        {
            $dsn = 'mysql:host=' . $host . ';dbname='. $dbname;
            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();
        }
    }

    

?>