<?php 
    if(isset($_POST['username'])){
        $db = new mysqli("localhost", "root", "", "store");
        $username = htmlspecialchars($_POST["username"], ENT_QUOTES);
        $password = htmlspecialchars($_POST["password"], ENT_QUOTES);

        $sql_query = 
                 "SELECT `UserName` 
                 FROM `user` 
                 WHERE `UserName` = '$username'";

        $response = $db->query($sql_query);
    
        if($response->num_rows === 0){
            $sql_query =
             "INSERT INTO `user` (`UserName`,`Password`) 
             VALUES ('$username', '$password')";
    
            $db->query($sql_query);
        
            setcookie('username', $username, time() + 3600);
            header("Location: index.php");

        
        }
        else{
        header("Location: account_already_exists.php");            
        }

            $db->close();
    }
    
?>
