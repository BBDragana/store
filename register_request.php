<?php 
    if(isset($_POST['username'])){
        $db = new mysqli("localhost", "root", "", "store");

        $sql_query = 
                 "SELECT `UserName` 
                 FROM `user` 
                 WHERE `UserName` = '$_POST[username]'";

        $response = $db->query($sql_query);
    
        if($response->num_rows === 0){
            $sql_query =
             "INSERT INTO `user` (`UserName`,`Password`) 
             VALUES ('$_POST[username]', '$_POST[password]')";
    
            $db->query($sql_query);
        
            setcookie('UserName', $_POST['username'], time() + 3600);
            header("Location: index.php");

        
        }
        else{
        header("Location: account_already_exists.php");            
        }

            $db->close();
    }
    
?>
