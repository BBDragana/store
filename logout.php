<?php 
    if(isset($_COOKIE['Username'])){
        setcookie('Username', '', time() - 3600);   
    }
     header("Location: index.php");

?>