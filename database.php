<?php
class database
{

    public function __construct()
    {
        // if(empty($_SESSION['user_id'])) header('Location: index.php');
    }

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

        if ($password !== $confirm_password) return 0;
        else {
            $hashpass = md5($password);
            $sql = "INSERT INTO user(`firstname`, `lastname`, `username`, `password`, `type`, `address`, `phone_no`, `created_at`, `update_at`)
                            VALUES ('$firstname', '$lastname', '$username', '$hashpass', 'user', '$address', '$phone_no', now(), now()) ";
            $query = mysqli_query($conn, $sql);
            if ($query) return 1;
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
        if ($countuser) {
            session_start();
            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$hashpass'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['firstname'] = $result['firstname'];
            $_SESSION['lastname'] = $result['lastname'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['type'] = $result['type'];
            $_SESSION['address'] = $result['address'];
            $_SESSION['phone_no'] = $result['phone_no'];
            if ($result['type'] === 'user') header('Location: userIndex.php');
            else if ($result['type'] === 'admin') header('Location: adminIndex.php');
        } else return 0;
        

        // return $countuser;
    }

    public function addProduct($product_name, $qty, $type, $size, $brand, $color, $description, $price, $picture)
    {
        $conn = $this->connect_db();

        $sql = "INSERT INTO `product` (`product_name`, `qty`, `type`, `size`, `brand`, `color`, `description`, `created_at`, `update_at`, `product_status`, `price`, `picture`) 
                            VALUES ('$product_name', '$qty', '$type', '$size', '$brand', '$color', '$description', now(), now(), '1', '$price', '$picture' )";
        $query = mysqli_query($conn, $sql);
        if ($query) return 1;
        else return 0;
    }

    public function listProduct()
    {
        $conn = $this->connect_db();

        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if ($result) return $result;
        else return 0;
    }

    public function listUser()
    {
        $conn = $this->connect_db();

        $sql = "SELECT * FROM user WHERE user_status = '1'";
        $query = mysqli_query($conn, $sql);

        $result = array();
        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $result[] = $row;
        }

        if ($result) return $result;
        else return 0;
    }

    public function updateUser($firstname, $lastname, $address, $phone_no, $user_id)
    {
        $conn = $this->connect_db();

        $sql = "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname', `address` = '$address', `phone_no` = '$phone_no' WHERE `user`.`user_id` = '$user_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) return $query;
        else return 0;
    }

    public function delUser($user_id)
    {
        $conn = $this->connect_db();

        $sql = "UPDATE `user` SET `user_status` = '$user_id' WHERE `user`.`user_id` = '$user_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) return $query;
        else return 0;
    }
    public function insertProduct($pName, $pBrand, $pType, $pColor, $pSize, $pPrice, $pQty, $pPicture)
    {
        $conn = $this->connect_db();

        $sql = "INSERT INTO product(`product_name`,`brand`,`type`,`color`,`size`,`price`,`qty`,`picture`)  VALUES ('$pName','$pBrand', '$pType','$pColor', '$pSize','$pPrice',  '$pQty', '$pPicture')";
        $query = mysqli_query($conn, $sql);

        if ($query) return $query;
        else return 0;
    }
    public function updateProduct($pName, $pBrand, $pType, $pColor, $pSize, $pPrice, $pQty, $pPicture, $id)
    {
        $conn = $this->connect_db();

        $sql = "UPDATE `product` SET `product_name` = '$pName', `brand` = '$pBrand', `type` = '$pType', `color` = '$pColor',`size` = '$pSize', `price` = '$pPrice', `qty` = '$pQty', `picture` = '$pPicture' WHERE `product`.`product_id` = '$id'";
        $query = mysqli_query($conn, $sql);

        if ($query) return $query;
        else return 0;
    }
    public function delProduct($product_id)
    {
        $conn = $this->connect_db();

        $sql = "DELETE FROM `product` WHERE `product`.`product_id` = '$product_id'";
        $query = mysqli_query($conn, $sql);

        if ($query) return $query;
        else return 0;
    }
}

    // $db = new database;
    // echo "<pre>";
    // print_r($db->register('admin', 'dsad', 'q', '1', '1', 'address das', '0844065875'));
    // // print_r($db->addProduct('อะไรดี', '10', '?', 's', 'gh', 'red', 'hhk', '10.20', 'imgpath'));
    // print_r($db->updateUser('q', 's', 'a', '084406575', '1'));

?>