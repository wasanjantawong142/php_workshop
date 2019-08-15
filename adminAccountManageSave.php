<?php
require_once "./database.php";

$db = new database;

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$phone_no = $_POST['tel'];
$user_id = $_POST['userId'];

$result_status = $db->updateUser($firstname, $lastname, $address, $phone_no, $user_id);
// echo "<pre>";
// print_r($result_status);
if($result_status) header("Location: adminAccountManage.php");
else echo "update error";


?>