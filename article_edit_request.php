<?php
  include 'includes/a_connection.php';
  $db = OpenCon();
            $sql_query = "UPDATE 
                        `article`
                         SET
                        `Code` ='$_POST[Code]', `Name` = '$_POST[Name]', `Unit` ='$_POST[Unit]', `BarCode` = '$_POST[BarCode]', `PLU_COD` ='$_POST[PLU_COD]'
                        WHERE ArticleId ='$_POST[ArticleId]'";
            $db->query($sql_query);

    CloseCon($db);

    header("Location: article_list.php");
?>