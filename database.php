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
    public function register($firstname, $lastname, $username, $password, $confirm_password, $address, $phone_no)
    {
        $conn = $this->connect_db();

        $sql = "SELECT COUNT(*) AS COUNT FROM user WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC); 
        $countuser = $result['COUNT'];
        if ($countuser > 0) return 0;

        if($password !== $confirm_password) return 0; 
        else{
            $hashpass = md5($password);
            $sql = "INSERT INTO user(`firstname`, `lastname`, `username`, `password`, `type`, `address`, `phone_no`, `created_at`, `update_at`)
                            VALUES ('$firstname', '$lastname', '$username', '$hashpass', 'user', '$address', '$phone_no', now(), now()) ";
            $query = mysqli_query($conn, $sql);
            if($query) return 1;
            else return 0;
        }
        // return 0;
    }

    public function login($username, $password)
    {
        $conn = $this->connect_db();
        $hashpass = md5($password);

        $sql = "SELECT COUNT(*) AS COUNT FROM user WHERE username = '$username' AND password = '$hashpass'";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($query, MYSQLI_ASSOC); 
        $countuser = $result['COUNT'];
        return $countuser;
    }


}
    // $db = new database;
    // echo "<pre>";
    // print_r($db->register('admin', 'dsad', 'admin015', '1', '1', 'address das', '0844065875'));
    ?>