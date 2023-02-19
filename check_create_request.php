<?php
session_start();
include 'includes/a_connection.php';
$db = OpenCon();

var_dump($_POST);

$sql_query1 = "SELECT  e.EmployeeId  FROM employee as e LEFT JOIN user as u ON e.UserId = u.UserId WHERE u.UserName = '" . $_SESSION["UserName"] . "'";
$response1 = $db->query($sql_query1);
$employee = $response1->fetch_assoc();
$tax = $_POST['total_amount'] * 0.17;
$sql_query2 = "INSERT INTO `check` (`EmployeeIdIssue`,  `CheckNumber`, `TotalAmount`, `TaxAmount`, `AmountWithoutTax`) VALUES 
( '".$employee['EmployeeId']."', '".$_POST['check_number']."', '".$_POST['total_amount']."',' ".$tax."', '".($_POST['total_amount'] - $tax)."')";
$response = $db->query($sql_query2);

$check_id = $db->insert_id;

//$sql_query3 = "INSERT INTO `checkitem` (`CheckId`, `ItemID`, `ArticleId`, `Quantity`, `Price`) VALUES ";

//( '".$employee['EmployeeId']."', '".$_POST['check_number']."', '".$_POST['total_amount']."',' ".$tax."', '".($_POST['total_amount'] - $tax)."')";
//$response = $db->query($sql_query3);

CloseCon($db);

header("Location: check_list.php");
