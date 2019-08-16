<?php
require_once "./database.php";

$db = new database;

$pName = $_POST['pName'];
$pBrand = $_POST['pBrand'];
$pType = $_POST['pType'];
$pColor = $_POST['pColor'];
$pSize = $_POST['pSize'];
$pPrice = $_POST['pPrice'];
$pQty = $_POST['pQty'];
// $pPicture = $_POST['pPicture'];


if (isset($_FILES['pPicture'])) {
    $name_file = $_FILES['pPicture']['name'];
    $tmp_name = $_FILES['pPicture']['tmp_name'];
    $locate_img = "img/";
    echo $tmp_name;
    echo $name_file;
    if (move_uploaded_file($tmp_name, $locate_img . $name_file)) {
        echo $tmp_name;
        echo $name_file;
    }
}
$result_status = $db->insertProduct($pName, $pBrand, $pType, $pColor, $pSize, $pPrice, $pQty, $name_file);
// echo "<pre>";
// print_r($result_status);
// exit;
if ($result_status) header("Location: adminProductManage.php");
else echo "update error";


?>