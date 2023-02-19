<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>
<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
<form action="employee_add_request.php" method="post">
            <input name='EmployeeId' type='text' placeholder='EmployeeId' hidden>
            <input name='FirstName' type='text' placeholder='FirstName' required>
            <input name='LastName' type='text' placeholder='LastName' required>
            <input name='PhoneNumber' type='text' placeholder='PhoneNumber'>
            <input name='Address' type='text' placeholder='Address'>
            <input name='City' type='text' placeholder='City'>
            <input name='Email' type='text' placeholder='Email'>
            <input name='JMBG' type='text' minlength='13' maxlength='13' placeholder='JMBG' required>
            <input type='submit' value = "ADD EMPLOYEE">
    </div>
</form>
</div>

</body>
</html>
