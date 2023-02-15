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

            $sql_query = "SELECT * FROM lager WHERE LagerId = ($_GET[id])";
            $response = $db->query($sql_query);
            $item = $response->fetch_assoc();

            $sql_query = "SELECT Name, ArticleId FROM article";
            $response = $db->query($sql_query);
            $select_options = "<option value=''></option>";
            while ($row = $response->fetch_assoc()) {
                $selected = '';
                if ($row['ArticleId'] == $item['ArticleId']) {
                    $selected = 'selected="selected"';
                }
                $select_options .= "<option value=" . $row['ArticleId'] . " . $selected .>" . $row['Name'] . "</option>";
            }


            echo "
        <form action='lager_edit_request.php' method='post'>
        <label for='Article'>Article</label>    
            <select id='Article' name='ArticleId'>" . $select_options . "</select>
            <input value='" . $item['LagerId'] . "' name='LagerId' type='text' placeholder='LagerId' hidden>
            <input value='" . $item['AvailableQuantity'] . "' name='AvailableQuantity' type='number' placeholder='AvailableQuantity' required>
            <input value='" . $item['Location'] . "' name='Location' type='text' placeholder='Location' required>
            <input type='submit' value'EDIT LAGER'>
        </form>
        ";
        }
        CloseCon($db);
        ?>
    </div>


    </div>

    <?php include("includes/footer.php"); ?>


</body>