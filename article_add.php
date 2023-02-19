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
	<form class="form_add" action="article_add_request.php" method="post">
    <!-- <input  name="ArticleId" type="text"placeholder="ArticleId" required> -->
    <input name="Code"type="text"  placeholder="Code" required>
    <br>
    <input  name="Name" type="text"placeholder="Name" required>
    <br>
    <input name="Unit"type="text"  placeholder="Unit">
    <br>
    <input name="BarCode"type="text"  placeholder="BarCode">
    <br>
    <input name="PLU_COD"type="text"  placeholder=" PLU_COD">
    <br>
    <br>
    <input type="submit" value="ADD ARTICLE">
    </div>
</form>
</div>
</body>
</html>
