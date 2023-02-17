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
    </div>
    <?php
    include 'includes/a_connection.php';
    $db = OpenCon();

    $sql_query = "SELECT * FROM article";
    $response = $db->query($sql_query);
    $select_options = "<option value=''></option>";
    while ($row = $response->fetch_assoc()) {
        $select_options .= "<option value=" . $row['ArticleId'] . "> " . $row['Code'] . " " . $row['Name'] . " " . $row['Unit'] . " " . $row['BarCode'] . "" . $row['PLU_COD'] . "</option>";
    }
    ?>

    <div>
        <form id="create_check_item_form" onsubmit="add_item(event)">
            <label for='Article'>Article</label>
            <select id='Article' name='ArticleId'><?php echo $select_options ?></select>
            <input name='Quantity' type='text' placeholder='Quantity' required>
            <input name='Price' type='text' placeholder='Price' required>
            <button type="submit">ADD ARTICLE ON CHECK</button>
        </form>
    </div>

    <!-- odavde je ispravljeno  -->
    <table>
        <tr>
            <th>ArticleId</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <tbody id="check_items">
        </tbody>



    </table>

    <?php CloseCon($db); ?>
    </div>
    <?php include("includes/footer.php"); ?>
    <script src="js/check_create.js"></script>
</body>

</html>