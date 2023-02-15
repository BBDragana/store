<?php
session_start();
if (isset($_POST['username'])) {
    include 'includes/a_connection.php';
    $db = OpenCon();
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
    $password = password_hash(htmlspecialchars($_POST["password"], ENT_QUOTES), PASSWORD_DEFAULT);

    $sql_query =
        "SELECT `UserName` 
                 FROM `user` 
                 WHERE `UserName` = '$username'";

    $response = $db->query($sql_query);

    if ($response->num_rows === 0) {
        $sql_query =
            "SELECT COUNT(UserId) FROM `user`";
        $response = $db->query($sql_query);
        $roleId = 0;
        if ($response->fetch_assoc()["COUNT(UserId)"] == 0) {
            $roleId = 1;
        } else {
            $roleId = 2;
        }
        $sql_query =
            "INSERT INTO `user` (`UserName`,`Password`, `RoleId`) 
     VALUES ('$username', '$password', '$roleId')";

        $response = $db->query($sql_query);
        if ($response) {
            setcookie('username', $username, time() + 3600);
            $_SESSION['RoleId'] = $roleId;
            $_SESSION['UserName'] = $username;
        }

        header("Location: index.php");
    } else {
        header("Location: account_already_exists.php");
    }
    CloseCon($db);
}
