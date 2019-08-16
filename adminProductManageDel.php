<?php
require_once "./database.php";

$db = new database;

$product_id = $_GET['productId'];

$result_status = $db->delProduct($product_id);

if ($result_status) header("Location: adminProductManage.php");


?>