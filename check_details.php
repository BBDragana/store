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
                <span id="total_am"></span>

            </p>
        </div>


        <div>
            <p><b>Check date: </b>
                <?php echo date("l jS \of F Y h:i:s A"); ?></p>
        </div>
        <div>
            <p><b>Employee </b>
                <?php
                $sql_query1 = "SELECT e.FirstName, e.LastName  FROM employee as e LEFT JOIN user as u ON e.UserId = u.UserId WHERE u.UserName = '" . $_SESSION["UserName"] . "'";
                $response1 = $db->query($sql_query1);
                $employee = $response1->fetch_assoc();
                echo $employee["FirstName"] . " " . $employee["LastName"] . " (" . $_SESSION["UserName"] . ")";
                ?></p>
        </div>
        <div>
            <p><b>Check number: </b>
                <input id="check_number" type="text" maxlength="30">
        </div>
        <div>
            <button onclick="save_check()"> SAVE </button>
        </div>
    </div>

    <script>
        articles = [];
        <?php
        $sql_query = "SELECT * FROM article";
        $response = $db->query($sql_query);
        while ($row = $response->fetch_assoc()) {
            echo "articles[" . $row['ArticleId'] . "] = '" . $row['Name'] . "';";
        }
        ?>

        var total_amount = 0;
        var check_items = <?php echo $_POST['check_items']; ?>;

        function write_table() {
            
            var tbody = document.getElementById("check_items");
            tbody.innerHTML = "";

            for (var i = 0; i < check_items.length; i++) {
                total_amount += check_items[i].Quantity * check_items[i].Price;
                tbody.innerHTML += "<tr><td>" + articles[check_items[i].ArticleId] + "</td><td>" + check_items[i].Quantity + "</td><td>" + check_items[i].Price + "</td></td>" + "</td><td>" + [(check_items[i].Quantity) * (check_items[i].Price)] + "</td></tr>";
            }
            document.getElementById("total_am").innerHTML = total_amount;

        }

        write_table();

        function save_check() {
            console.log("radi");
            document.body.innerHTML += `<form id="dynForm" action="check_create_request.php" method="post">
                 <input type="hidden" name="check_items" value='` + check_items + `'>
                 <input type="hidden" name="total_amount" value='` + total_amount + `'>
                 <input type="hidden" name="check_number" value='` + document.getElementById("check_number").value + `'>
            
             </form>`;
            document.getElementById("dynForm").submit();
        }
    </script>

    <?php CloseCon($db); ?>
</body>

</html>