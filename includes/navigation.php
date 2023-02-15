<?php
session_start();
?>
<div class="container">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>" href="index.php">Home</a>
		</li>

		<?php
		if (isset($_SESSION['UserName'])) {
		?>
			<li class="nav-item">
					<a class="nav-link <?php if ($CURRENT_PAGE == "Article") { ?>active<?php } ?>" href="article_list.php">Article</a>
				</li>

			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Employee") { ?>active<?php } ?>" href="employee_list.php">Employee</a>
			</li>
		<?php
			if (array_key_exists('RoleId', $_SESSION) && $_SESSION['RoleId'] == 1) {
		?>
				<li class="nav-item">
					<a class="nav-link <?php if ($CURRENT_PAGE == "Password_reset_request") { ?>active<?php } ?>" href="new_password_requests.php">Password reset requests</a>
				</li>
				
			<?php
			}
			?>

			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Contact") { ?>active<?php } ?>" href="contact.php">Check</a>
			</li>
			
		<?php
		}
		?>
	</ul>
</div>