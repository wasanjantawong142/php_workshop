<?php
require_once "./database.php";

$db = new database;

$product_id = $_POST['productId'];
// echo $product_id;
$result_status = $db->delProduct($product_id);
// echo $result_status;
if ($result_status) header("Location: adminProductManage.php");


?>