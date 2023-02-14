<?php
session_start();
if (isset($_POST['username'])) {

    $db = new mysqli("localhost", "root", "", "store");
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);
    $sql_query =
        "SELECT UserName, Password, RoleId FROM `user`
                 WHERE `UserName` = '$username'";

    $response = $db->query($sql_query);

    if ($response->num_rows == 1) {
        $response_value = $response->fetch_assoc();
        $password_from_db = $response_value['Password'];
        if ($password_from_db == "") {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql_query =
                "UPDATE `user`
                SET `Password` = '$password_hash'
                WHERE `UserName` = '$username'";
            $response = $db->query($sql_query);
        } else if (!password_verify($password, $password_from_db)) {
            header("Location: incorect_username_or_password.php");
        }
        setcookie('username', $username, time() + 3600);
        $_SESSION['RoleId'] = $response_value['RoleId'];
        $_SESSION['UserName'] = $username;
        header("Location: index.php");
    } else {
        header("Location: incorect_username_or_password.php");
    }




    $db->close();
}
