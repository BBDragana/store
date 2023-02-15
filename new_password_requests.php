<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
<?php
  include 'includes/a_connection.php';
  $db = OpenCon();

$sql_query =
"SELECT `UserName`, `UserId` FROM `user` WHERE `NewPassword` = 1";

$result = $db->query($sql_query);

if ($result->num_rows > 0) {
?>
    <table>
        <th>UserName</th>
        <th></th>
       
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['UserName'] . "</td>";
        echo "<td><a href=reset_password_request.php?id='" . $row['UserId'] . "'>Reset password</a></td>";
        echo "</tr>";
    }
    
}
CloseCon($db);
    ?>
    </table>
</div>

<?php include("includes/footer.php");?>

</body>
</html>