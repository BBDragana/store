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


            $sql_query = "SELECT * FROM article WHERE ArticleId =($_GET[id])";
            $response = $db->query($sql_query);
            $item = $response->fetch_assoc();
       echo "
        <form action='article_edit_request.php' method='post'>
            <input value='".$item['ArticleId'] ."' name='ArticleId' type='text' placeholder='ArticleId' hidden>
            <input value='".$item['Code'] ."' name='Code' type='text' placeholder='Code' required>
            <input value='".$item['Name'] ."' name='Name' type='text' placeholder='Name' required>
            <input value='".$item['Unit'] ."' name='Unit' type='text' placeholder='Unit'>
            <input value='".$item['BarCode'] . "' name='BarCode' type='text' placeholder='BarCode'>
            <input value='".$item['PLU_COD'] . "' name='PLU_COD' type='text' placeholder='PLU_COD'>
            <input type='submit' value'EDIT ARTICLE'>

        </form>
        ";
    }
     CloseCon($db);
    ?>
    </div>
 

    </div>
</body>

</html>