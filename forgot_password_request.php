<?php
if (isset($_POST['username'])) {
    include 'includes/a_connection.php';
    $db = OpenCon();
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);

    $sql_query =
        "UPDATE `user`
        SET `NewPassword` = '1' 
        WHERE `UserName` = '$username'";

    $db->query($sql_query);

    CloseCon($db);
}

header("Location: index.php");
?>