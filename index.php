<?php 
include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

	<?php include("includes/design-top.php"); ?>
	<?php include("includes/navigation.php"); ?>

	<div class="container" id="main-content">
		<h2>Welcome to my store!</h2>

		<?php
		if (isset($_COOKIE['username'])) {
		?>
			<div>
					<a href="logout.php">LOG OUT</a>
			</div>
		<?php
		} else {
		?>
			<div>
					<a href="login.php">LOG IN</a>
			</div>
			<div>
					<a href="register.php">REGISTER</a>
			</div>
		<?php
		}
		?>
<?php
if (isset($_SESSION['RoleId'])) {
	header("Location: article_list.php");
}
?>

</body>

</html>