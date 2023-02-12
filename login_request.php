<?php 
    if(isset($_POST['username'])){
        
        $db = new mysqli("localhost", "root", "", "store");
        $sql_query = 
        "SELECT * FROM `user`
                 WHERE `UserName` = '$_POST[username]'";

        $response = $db->query($sql_query);

        if($response->num_rows == 1 && $response->fetch_assoc()['Password'] == $_POST['password']){
            setcookie('UserName', $_POST['username'], time() + 3600);
             header("Location: index.php");
        }

      
        else{
            header("Location: incorect_username_or_password.php");
            }

        
   $db->close();
  }
  
?> 