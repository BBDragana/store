<?php 
    if(isset($_POST['Code'])){

        include 'includes/a_connection.php';
        $db = OpenCon();
        
        //$db = new mysqli("localhost", "root", "", "store");

        $sql_query = "SELECT Code FROM article WHERE Code ='$_POST[Code]'";
        $response = $db->query($sql_query);
    
        if($response->num_rows == 0){
        
            $sql_query = "INSERT INTO 
                         article 
                         (Code,Name,Unit,BarCode,PLU_COD) 
                         VALUES 
                        ('$_POST[Code]', '$_POST[Name]','$_POST[Unit]', '$_POST[BarCode]','$_POST[PLU_COD]')";
            $db->query($sql_query);

        }
        CloseCon($db);
        
             header("Location: article_list.php");
            
    }
    ?>
    