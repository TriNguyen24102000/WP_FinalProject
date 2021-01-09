<?php

    include_once('../Service/UserService.php');

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

   //get user permission
   function getPermission($username, $pwd)
   {
       //declaration
       $datas = array();

       $sql = "SELECT * from permission JOIN user ON permission.permissionID = user.roleID WHERE user.username = :uname AND user.password = :pwd";
       $stmt = Connect()->prepare($sql);
       
       //Binding value to parameter
       $stmt->bindValue(':uname', $username);
       $stmt->bindValue(':pwd', $pwd);

       $stmt->execute();

       return $stmt->fetch(PDO::FETCH_ASSOC); 
   }

   //Check if account exists
   function confirmAccount($username, $password)
   {
       $sql = "SELECT * FROM user WHERE username = :uname AND user.password = :pwd";
       $stmt = Connect()->prepare($sql);
       
       //binding parameter
       $stmt->bindValue(':uname', $username);
       $stmt->bindValue(':pwd', $password);

       //execute query
       $stmt->execute();

       $numRow = $stmt->rowCount();

       if($numRow > 0)
           return true;
       return false;
   }

   function comparePassword($srcPass, $desPass)
   {
       return $srcPass == $desPass;
   }

   function isCorrectSignupFormat($username, $pwd, $name, $email, $address, $dob, $phone)
   {
        if(isset($username) && isset($pwd) && isset($name) && isset($email) && isset($address) && isset($dob)
                           && isset($phone))
            return true;
        return false;
   }

   function isEqualsPassword($password, $confirmPassword)
   {
       return $password == $confirmPassword;
   }

   function getLastUserID()
   {
       $sql = "SELECT `userID` FROM `user` ORDER BY `userID` DESC LIMIT 1";
       $stmt = Connect()->query($sql);

       return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   function dropFK()
   {
       $sql = "ALTER TABLE `user` DROP FOREIGN KEY `fk_user_permission`;";
       $stmt = Connect()->query($sql);
   }

   function isEmpty($str)
   {
       return strlen($str) == 0;
   }

   function getIDByUserName($array, $username)
   {
       foreach($array as $data)
       {
           if($data['username'] == $username)
           {
               return $data['userID'];
           }
       }
   }

?>