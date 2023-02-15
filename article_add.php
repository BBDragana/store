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
	<form action="article_add_request.php" method="post">
    <!-- <input  name="ArticleId" type="text"placeholder="ArticleId" required> -->
    <input name="Code"type="text"  placeholder="Code" required>
    <input  name="Name" type="text"placeholder="Name" required>
    <input name="Unit"type="text"  placeholder="Unit">
    <input name="BarCode"type="text"  placeholder="BarCode">
    <input name="PLU_COD"type="text"  placeholder=" PLU_COD">
    <input type="submit" value="ADD ARTICLE">
    </div>
</form>
</div>

<?php include("includes/footer.php");?>

</body>
</html>
