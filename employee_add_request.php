<?php 
    if(isset($_POST['FirstName'],$_POST['LastName'], $_POST['JMBG'])){

        include 'includes/a_connection.php';
        $db = OpenCon();

        $sql_query = "SELECT * FROM employee WHERE JMBG ='$_POST[JMBG]'";
        $response = $db->query($sql_query);
    
        if($response->num_rows == 0){
        
            $sql_query = "INSERT INTO 
                         employee 
                         (FirstName,LastName,PhoneNumber,Address,City,Email,JMBG) 
                         VALUES 
                        ('$_POST[FirstName]', '$_POST[LastName]','$_POST[PhoneNumber]', '$_POST[Address]','$_POST[City]','$_POST[Email]','$_POST[JMBG]')";
            $db->query($sql_query);

        }
        CloseCon($db);
        
             header("Location: employee_list.php");
            
    }
    ?>
    