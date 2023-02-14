<?php
session_start();
$_SESSION['RoleId'] = 0;
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600);
}
header("Location: index.php");
