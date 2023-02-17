<?php
session_start();
$_SESSION["isLoggedIn"] = false;
header('Location: login1.php');
?>