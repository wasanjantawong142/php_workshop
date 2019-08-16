<?php
    require_once "./database.php";
    $db = new database;
    
    if(!empty($_GET['productId'])){
        $productId = $_GET['productId'];
        // print_r($_SESSION['selectProduct']);
        if(empty($_SESSION['selectProduct'][$productId])) $_SESSION['selectProduct'][$productId] = 1;
        else{
            if($_SESSION['selectProduct'][$productId] == 1){
                unset($_SESSION['selectProduct'][$productId]);
            }else{
                $_SESSION['selectProduct'][$productId] = 1;
            }
        }
    }

    if(!empty($_POST['btnadd'])){
        $qty = $_POST['qty'];
        $productId = $_POST['productId'];
        $userID = $_SESSION['userId'];
        // echo "<pre>";
        // print_r($qty);
        // print_r($productId);
        // print_r($_SESSION);
        $insert = $db->insertOrder($userID, $productId, $qty);

        if($insert){
            // echo $insert;
            echo '<script language="javascript">';
            echo 'alert("ทำรายการสำเร็จ");window.location.href="userIndex.php"';
            echo '</script>';
            exit;
        }else{
            // echo $insert;
            echo '<script language="javascript">';
            echo 'alert("บันทึกผิดพลาด");window.location.href="userIndex.php"';
            echo '</script>';
            exit;
        }
    }

    
    
    header("Location: userIndex.php");


?>