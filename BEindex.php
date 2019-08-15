<?php

require_once "./database.php";

$db = new database;

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$login_ok = $db->login($username, $password);


if($login_ok == 1){
echo '<script language="javascript">';
echo 'alert("Login success");window.location.href="register.php"';
echo '</script>';

}else{
  echo '<script language="javascript">';
  echo 'alert("Login Error");window.location.href="index.php"';
  echo '</script>';
}

?>
