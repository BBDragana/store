<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/design-top.php"); ?>
    <?php include("includes/navigation.php"); ?>


    </form>
    </div>
    <?php
    include 'includes/a_connection.php';
    $db = OpenCon();

    $sql_query = "SELECT Name, ArticleId FROM article";
    $response = $db->query($sql_query);
    $item = $response->fetch_assoc();
    $select_options = "<option value=''></option>";
    while ($row = $response->fetch_assoc()) {
        $selected = '';
        // if($row['LagerId'] == $item['LagerId']){
        //     $selected = 'selected="selected"';
        // }
        $select_options .= "<option value=" . $row['ArticleId'] . " . $selected .>" . $row['Name'] . "</option>";
    }

    CloseCon($db);
  echo "
    <div class='content'>
        <form class='form_add' action='lager_add_request.php' method='post'>
        <label for='Article'>Article</label>    
        <select id='Article' name='ArticleId'>" . $select_options . "</select>
            <!-- <input name='LagerId' type='text' placeholder='LagerId'> -->
            <!-- <input name='ArticleId' type='text' placeholder='ArticleId' hidden> -->
            <input name='AvailableQuantity' type='text' placeholder='AvailableQuantity' required>
            <input name='Location' type='text' placeholder='Location' required>
            <input type='submit' value='ADD LAGER'>
        </form>
    </div>"
  ?>

</body>

</html>