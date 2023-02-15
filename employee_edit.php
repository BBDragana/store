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
        <?php
        if (isset($_GET['id'])) {

            include 'includes/a_connection.php';
            $db = OpenCon();

            $sql_query = "SELECT * FROM employee WHERE EmployeeId =($_GET[id])";
            $response = $db->query($sql_query);
            $item = $response->fetch_assoc();

            $sql_query = "SELECT UserName, UserId  FROM user";
            $response = $db->query($sql_query);
            $select_options = "<option value=''></option>";            
            while ($row = $response->fetch_assoc()) {
                $selected = '';
                if($row['UserId'] == $item['UserId']){
                    $selected = 'selected="selected"';
                }
                $select_options .= "<option value=" . $row['UserId'] . " . $selected .>". $row['UserName'] . "</option>";
            }

       echo "
        <form action='employee_edit_request.php' method='post'>
            <input value='".$item['EmployeeId'] ."' name='EmployeeId' type='text' placeholder='EmployeeId' hidden>
            <input value='".$item['FirstName'] ."' name='FirstName' type='text' placeholder='FirstName' required>
            <input value='".$item['LastName'] ."' name='LastName' type='text' placeholder='LastName' required>
            <input value='".$item['PhoneNumber'] ."' name='PhoneNumber' type='text' placeholder='PhoneNumber'>
            <input value='".$item['Address'] . "' name='Address' type='text' placeholder='Address'>
            <input value='".$item['City'] . "' name='City' type='text' placeholder='City'>
            <input value='".$item['Email'] ."' name='Email' type='text' placeholder='Email'>
            <input value='".$item['JMBG'] . "' name='JMBG' type='text' minlength='13' maxlength='13' placeholder='JMBG'>
            <select name='UserId'>" . $select_options . "</select>
            <input type='submit' value'EDIT EMPLOYEE DATA'>

        </form>
        ";
    }
     CloseCon($db);
    ?>
    </div>
 

    </div>

    <?php include("includes/footer.php"); ?>


</body>
