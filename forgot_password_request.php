<?php
if (isset($_POST['username'])) {
    $db = new mysqli("localhost", "root", "", "store");
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);

    $sql_query =
        "UPDATE `user`
        SET `NewPassword` = '1' 
        WHERE `UserName` = '$username'";

    $db->query($sql_query);

    $db->close();
}

header("Location: index.php");
?>