<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/design-top.php"); ?>
    <?php include("includes/navigation.php"); ?>

    <div class="content">
        <div class="form-content">
            <?php
            include 'includes/a_connection.php';
            $db = OpenCon();

            $sql_query = "SELECT * FROM article";
            $response = $db->query($sql_query);
            $select_options = "<option value=''></option>";
            $articles = [];
            while ($row = $response->fetch_assoc()) {
                $select_options .= "<option value=" . $row['ArticleId'] . "> " . $row['Code'] . " " . $row['Name'] . " " . $row['Unit'] . " " . $row['BarCode'] . "" . $row['PLU_COD'] . "</option>";
                $articles[$row['ArticleId']] = $row['Name'];
            }
            ?>

            <div class="form-content">
                <form id="create_check_item_form" onsubmit="add_item(event)">
                    <label for='Article'>Article</label>
                    <select id='Article' name='ArticleId'><?php echo $select_options ?></select>
                    <input name='Quantity' type='text' placeholder='Quantity' required>
                    <input name='Price' type='text' placeholder='Price' required>
                    <button type="submit">ADD ARTICLE ON CHECK</button>
                </form>
            </div>
            <table>
                <tr>
                    <th>Article</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <tbody id="check_items">
                </tbody>
            </table>
            <a href="check_list.php">Quit</a>
            <!-- <a href="check_details.php">Details</a> -->
            <button onclick='postToDetails()'>Details</button>
            <?php CloseCon($db); ?>
        </div>
        <script>
            var articles = {

                <?php
                foreach (array_keys($articles) as $key) {
                    echo $key . ":'" . $articles[$key] . "',";
                } ?>
            };

        </script>
        <script src="js/check_create.js"></script>
    </div>
</body>

</html>