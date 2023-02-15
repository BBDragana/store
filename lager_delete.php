<?php
if (!isset($_COOKIE['username'])) {
    header("Location: login.php");
}
include 'includes/a_connection.php';
$db = OpenCon();

$sql_query =
    "DELETE FROM `lager` 
     WHERE LagerId=" . $_GET['id'];

$response = $db->query($sql_query);
header("Location: lager_list.php");
CloseCon($db);
