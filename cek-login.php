<?php
session_start();

if(!isset($_SESSION['status-login']) || $_SESSION['status-login'] !== true ){
    header("Location: login.php");
    exit; // tambahkan exit setelah redirect
}

?>
