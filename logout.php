<?php
unset($_COOKIE['user']);
setcookie("user", "", time() - 3600, '/');
header('Location: login1.php');
?>