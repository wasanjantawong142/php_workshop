<?php
    require_once "./database.php";
    $db = new database;
    session_destroy();
    header("Location: index.php");

?>