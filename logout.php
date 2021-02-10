<?php
require_once 'inc/inc.conf.php';
session_start();
unset($_SESSION['user']);
session_destroy();
$url = "login.php?e=4";
header('Location:'.$url);
?>