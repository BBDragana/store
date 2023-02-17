<?php
session_start();
?>
<div class="sidenav" >
	<ul>
		<!-- <li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>" href="index.php">Home</a>
		</li> -->

		<?php
		if (isset($_SESSION['UserName'])) {
		?>
			<li class="nav-item">
					<a class="nav-link <?php if ($CURRENT_PAGE == "Article") { ?>active<?php } ?>" href="article_list.php">Article</a>
				</li>

			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Employee") { ?>active<?php } ?>" href="employee_list.php">Employee</a>
			
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Lager") { ?>active<?php } ?>" href="lager_list.php">Lager</a>
			</li>
			<li class="nav-item">
					<a class="nav-link <?php if ($CURRENT_PAGE == "Check") { ?>active<?php } ?>" href="check_list.php">Check</a>
				</li>
		<?php
			if (array_key_exists('RoleId', $_SESSION) && $_SESSION['RoleId'] == 1) {
		?>
				<li class="nav-item " id="pass_requests">
					<a class="nav-link <?php if ($CURRENT_PAGE == "Password_reset_request") { ?>active<?php } ?>" href="new_password_requests.php">Password reset requests</a>
				</li>
				
			<?php
			}
			?>

			
			
		<?php
		}
		?>
	</ul>
</div>