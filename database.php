<?php
class database
{
    public function connect_db()
    {
        $serverName = "192.168.20.102"; //Database Server 
        $userName = "root"; // 
        $userPassword = ""; 
        $dbName = "db_php_workshop";

        $conn = mysqli_connect(    
            $serverName,    
            $userName,    
            $userPassword,    
            $dbName 
        );

        if (mysqli_connect_errno()) return "Database Connect Failed : " . mysqli_connect_error(); 
        else return $conn;
    }
}
