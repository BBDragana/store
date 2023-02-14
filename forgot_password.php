<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
	<?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

	<?php include("includes/design-top.php"); ?>
	<?php include("includes/navigation.php"); ?>

	<div class="container" id="main-content">
		<h2>After you sent request, administrator will set you a new password.</h2>
		<form action="forgot_password_request.php" method="POST">
			<input type="text" name="username" placeholder="Username" required>
			<input type="submit" value="Request new password">
		</form>


	</div>

	<?php include("includes/footer.php"); ?>

</body>

</html>