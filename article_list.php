
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

//$connection = new mysqli("localhost", "root", "", "store");

$sql =
    "SELECT * FROM article";

$result = $db->query($sql);

if ($result->num_rows > 0) {
?>
    <table>
        <th>ArticleId</th>
        <th>Code</th>
        <th>Name</th>
        <th>Unit</th>
        <th>BarCode</th>
        <th>PLU_COD</th>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ArticleId'] . "</td>";
        echo "<td>" . $row['Code'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Unit'] . "</td>";
        echo "<td>" . $row['BarCode'] . "</td>";
        echo "<td>" . $row['PLU_COD'] . "</td>";
        ?>
        <?php
        if($_SESSION['RoleId'] == 1){
        echo "<td><a href=article_edit.php?id='" . $row['ArticleId'] . "'>Edit</a></td>";
        // echo "<td><a href=article_delete.php?id=" . $row['ArticleId'] . ">Delete</a></td>";
    }
        echo "</tr>";
        
    }
    
}
    ?>
    </table>
    <?php
    if ($result->num_rows == 0) {
        echo "There are no article to display!";
    }

   
    ?>
<?php 
 if($_SESSION['RoleId'] == 1){
    ?>
    <button>
   <a href="article_add.php">ADD NEW ARTICLE</a>
   </button>
<?php
}
CloseCon($db);
 ?>
    <br>

    <div>
        <button>
            <a href="logout.php">LOG OUT</a>
        </button>
    </div>

</div>

<?php include("includes/footer.php");?>

</body>
</html>





















