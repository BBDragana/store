<?php
include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

    <?php include("includes/design-top.php"); ?>
    <?php include("includes/navigation.php"); ?>


    <div class="content">

        <?php
        include 'includes/a_connection.php';
        $db = OpenCon();
        ?>
        <table>
            <th>Article</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount</th>
            <tbody id="check_items"></tbody>

        </table>
        <div>
            <p><b>Total amount: </b>
            <span id="total_amount"></span>

            </p>
        </div>


        <div>
            <p><b>Check date: </b>
                <?php echo date("l jS \of F Y h:i:s A"); ?></p>
        </div>
        <div>
            <p><b>Employee </b>
                <?php
                $sql_query1 = "SELECT e.FirstName, e.LastName FROM employee as e LEFT JOIN user as u ON e.UserId = u.UserId WHERE u.UserName = '" . $_SESSION["UserName"] . "'";
                $response1 = $db->query($sql_query1);
                $employee = $response1->fetch_assoc();
                echo $employee["FirstName"] . " " . $employee["LastName"] . " (" . $_SESSION["UserName"] . ")";
                ?></p>
        </div>
        <div>
            <p><b>Check number: </b>
                <input type="text" maxlength="30">
        </div>
    </div>

    <div>
        <button> SAVE </button>
    </div>

    <script>
        console.log(<?php echo $_POST['check_items'];  ?>);
        articles = [];
        <?php
         $sql_query = "SELECT * FROM article";
         $response = $db->query($sql_query);
        while ($row = $response->fetch_assoc()) {
            echo "articles[" . $row['ArticleId'] . "] = '" . $row['Name'] . "';";
        }
        ?>

        function write_table() {
            var check_items = <?php echo $_POST['check_items']; ?>;
            var tbody = document.getElementById("check_items");
            tbody.innerHTML = "";
            var total_amount = 0;
            for (var i = 0; i < check_items.length; i++) {
                total_amount += check_items[i].Quantity * check_items[i].Price;
                tbody.innerHTML += "<tr><td>" + articles[check_items[i].ArticleId] + "</td><td>" + check_items[i].Quantity + "</td><td>" + check_items[i].Price + "</td></td>" + "</td><td>" + [(check_items[i].Quantity) * (check_items[i].Price)] + "</td></tr>";
            }
            document.getElementById("total_amount").innerHTML = total_amount;
    
        }
    
        write_table();
    </script>

    <?php CloseCon($db); ?>
</body>

</html>