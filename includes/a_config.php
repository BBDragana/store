<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/php-template/about.php":
		$CURRENT_PAGE = "About";
		$PAGE_TITLE = "About Us";
		break;
	case "/php-template/contact.php":
		$CURRENT_PAGE = "Contact";
		$PAGE_TITLE = "Contact Us";
		break;
	case "/projects/store.git/login.php":
	case "/projects/store.git/incorect_username_or_password.php":
		$CURRENT_PAGE = "Login";
		$PAGE_TITLE = "Login";
		break;
	default:
		$CURRENT_PAGE = "Index";
		$PAGE_TITLE = "Welcome to my store!";
}

?>