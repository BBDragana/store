<?php
if (isset($_POST['username'])) {

    $db = new mysqli("localhost", "root", "", "store");
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    $sql_query =
        "SELECT * FROM `user`
                 WHERE `UserName` = '$username'";

    $response = $db->query($sql_query);

    if ($response->num_rows == 1 && password_verify($password, $response->fetch_assoc()['Password'])) {
        setcookie('username', $username, time() + 3600);
        header("Location: index.php");
    } else {
        header("Location: incorect_username_or_password.php");
    }


    $db->close();
}
