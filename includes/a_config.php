<?php
switch ($_SERVER["SCRIPT_NAME"]) {
	case "/php-template/about.php":
		$CURRENT_PAGE = "About";
		$PAGE_TITLE = "About Us";
		break;
	case "/projects/store.git/article_list.php":
		$CURRENT_PAGE = "Article";
		$PAGE_TITLE = "Article";
		break;
	case "/projects/store.git/employee_list.php":
		$CURRENT_PAGE = "Employee";
		$PAGE_TITLE = "Employee";
		break;
	case "/projects/store.git/lager_list.php":
		$CURRENT_PAGE = "Lager";
		$PAGE_TITLE = "Lager";
		break;
	case "/projects/store.git/new_password_requests":
		$CURRENT_PAGE = "Password_reset_request";
		$PAGE_TITLE = "Password reset request";
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
