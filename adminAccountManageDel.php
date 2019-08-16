<?php
require_once "./database.php";

$db = new database;

$user_id = $_POST['userId'];

$result_status = $db->delUser($user_id);

if ($result_status) header("Location: adminAccountManage.php");


?>