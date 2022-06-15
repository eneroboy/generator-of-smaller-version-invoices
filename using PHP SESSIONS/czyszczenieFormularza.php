<?php
session_start(); 
header("HTTP/1.1 204"); 
//session_unset($_SESSION['powrot']);
$_SESSION = array();
session_destroy();
header("location: index.php");
?>