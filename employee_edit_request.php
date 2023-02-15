<?php
include 'includes/a_connection.php';
$db = OpenCon();
$sql_query = "UPDATE 
                        `employee`
                         SET
                         `FirstName` = '$_POST[FirstName]', `LastName` ='$_POST[LastName]', `PhoneNumber` = '$_POST[PhoneNumber]', `Address` ='$_POST[Address]',
                        `City` ='$_POST[City]',`Email` = '$_POST[Email]',`JMBG` = '$_POST[JMBG]', `UserId` = '$_POST[UserId]'
                        WHERE EmployeeId = '$_POST[EmployeeId]'";
$db->query($sql_query);

CloseCon($db);

header("Location: employee_list.php");
