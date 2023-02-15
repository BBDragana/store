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
				<button>
					<a href="logout.php">LOG OUT</a>
				</button>
			</div>
		<?php
		} else {
		?>
			<div>
				<button>
					<a href="login.php">LOG IN</a>
				</button>
			</div>
			<div>
				<button>
					<a href="register.php">REGISTER</a>
				</button>
			</div>
		<?php
		}
		?>
<?php
if (isset($_SESSION['RoleId'])) {
	header("Location: article_list.php");
}
?>


		<?php include("includes/footer.php"); ?>

</body>

</html>