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
        $sql =
            "SELECT * FROM `check`";

        $result = $db->query($sql);

        ?>
        <a id="add_new" href="check_create.php">CREATE NEW CHECK</a>
        <?php

        ?>
<div class="table-cont">
        <table>
            <th>CheckId</th>
            <th>EmployeeIdIssue</th>
            <th>CheckData</th>
            <th>CheckNumber</th>
            <th>TotalAmount</th>
            <th>TaxAmount</th>
            <th>AmountWithoutTax</th>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['CheckId'] . "</td>";
                echo "<td>" . $row['EmployeeIdIssue'] . "</td>";
                echo "<td>" . $row['CheckData'] . "</td>";
                echo "<td>" . $row['CheckNumber'] . "</td>";
                echo "<td>" . $row['TotalAmount'] . "</td>";
                echo "<td>" . $row['TaxAmount'] . "</td>";
                echo "<td>" . $row['AmountWithoutTax'] . "</td>";
            }
            ?>
        </table>
        <div class="logout">
            <a href="logout.php">LOG OUT</a>
        </div>
        </div>
        <?php
        if ($result->num_rows == 0) {
            echo "There are no check to display!";
        }
        ?>
        
    </div>
</body>

</html>