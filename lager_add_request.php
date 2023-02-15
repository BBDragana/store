<?php
if (isset($_POST['AvailableQuantity'], $_POST['Location'])) {

    include 'includes/a_connection.php';
    $db = OpenCon();

    $sql_query = "INSERT INTO 
                         lager 
                         (ArticleId,AvailableQuantity,Location) 
                         VALUES 
                        ('$_POST[ArticleId]','$_POST[AvailableQuantity]', '$_POST[Location]')";
    $db->query($sql_query);
}
CloseCon($db);

header("Location: lager_list.php");
