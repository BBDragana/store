<?php
session_start();
if (isset($_GET['id']) && $_SESSION['RoleId'] == 1) {

    $db = new mysqli("localhost", "root", "", "store");
    $sql_query =
    "UPDATE `user` SET `Password` = '', `NewPassword` = 0 WHERE `UserId` = ($_GET[id])";

    $response = $db->query($sql_query);

    header("Location: new_password_requests.php");

    $db->close();
}
?>