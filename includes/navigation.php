<?php
session_start();
?>
<div class="sidebar">
		<?php
		if (isset($_SESSION['UserName'])) {
		?>
				<a class="link-item <?php if ($CURRENT_PAGE == "Article") { ?>active<?php } ?>" href="article_list.php">Article</a>

				<a class="link-item <?php if ($CURRENT_PAGE == "Employee") { ?>active<?php }?>" href="employee_list.php">Employee</a>

				<a class="link-item <?php if ($CURRENT_PAGE == "Lager") { ?>active<?php } ?>" href="lager_list.php">Lager</a>
		
				<a class="link-item <?php if ($CURRENT_PAGE == "Check") { ?>active<?php } ?>" href="check_list.php">Check</a>
			<?php
			if (array_key_exists('RoleId', $_SESSION) && $_SESSION['RoleId'] == 1) {
			?>
				<div id="pass_requests">
					<a class="link-item <?php if ($CURRENT_PAGE == "Password_reset_request") { ?>active<?php } ?>" href="new_password_requests.php">Password reset requests</a>
			</div>

			<?php
			}
			?>
		<?php
		}
		?>
</div>