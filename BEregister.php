<?php

require_once "./database.php";

$db = new database;



$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];
$confirmedpass = $_REQUEST["confirmedpass"];
$tel = $_REQUEST["tel"];
$address = $_REQUEST["address"];

$regis_ok = $db->register($fname, $lname, $user, $pass, $confirmedpass, $tel, $address);

if(!$regis_ok ){
echo '<script language="javascript">';
echo 'alert("Register success");window.location.href="index.php"';
echo '</script>';
}else{
echo '<script language="javascript">';
echo 'alert("Register Error");window.location.href="register.php"';
echo '</script>';
}
?>
<a href="index.php">
  <input type="button" value="Back">
</a>