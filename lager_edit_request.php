<?php
include 'includes/a_connection.php';
$db = OpenCon();
$sql_query = "UPDATE   `lager`
                         SET
                         `ArticleId` = '$_POST[ArticleId]', `AvailableQuantity` ='$_POST[AvailableQuantity]', `Location` = '$_POST[Location]'
                        WHERE LagerId = '$_POST[LagerId]'";
$db->query($sql_query);

CloseCon($db);

header("Location: lager_list.php");
