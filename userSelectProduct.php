<?php
    require_once "./database.php";
    $db = new database;
    
    if(!empty($_GET['productId'])){
        $productId = $_GET['producID'];
        if($_SESSION['selectProduct'][$productId] == 1){
            unset($_SESSION['selectProduct'][$productId]);
        }else{
            $_SESSION['selectProduct'][$productId] = 1;
        }
    }

    if(!empty($_POST['btnadd'])){
        $qty = $_POST['qty'];
        $productId = $_POST['productId'];

        echo "<pre>";
        print_r($qty);
        print_r($productId);
        print_r($_SESSION);
    }
    
    // header("Location: userIndex.php");


?>