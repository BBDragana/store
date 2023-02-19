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
            "SELECT l.LagerId, l.ArticleId, l.AvailableQuantity,l.Location, a.Name FROM `lager` as l LEFT JOIN article as a ON a.ArticleId = l.ArticleId";

        $result = $db->query($sql);


        if ($result->num_rows > 0) {
            if ($_SESSION['RoleId'] == 1) {
        ?>
                <a id="add_new" href="lager_add.php">ADD NEW LAGER</a>
            <?php
            }
            ?>
            <div class="table-cont">
                <table>
                    <th>Lager Id</th>
                    <th>Article Name</th>
                    <th>Available Quantity</th>
                    <th>Location</th>

                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['LagerId'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['AvailableQuantity'] . "</td>";
                        echo "<td>" . $row['Location'] . "</td>";
                    ?>
                    <?php
                        if ($_SESSION['RoleId'] == 1) {
                            echo "<td><a href=lager_edit.php?id='" . $row['LagerId'] . "'>Edit</a></td>";
                            echo "<td><a href=lager_delete.php?id=" . $row['LagerId'] . ">Delete</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="logout">
                    <a href="logout.php">LOG OUT</a>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if ($result->num_rows == 0) {
            echo "There are no lager to display!";
        }

        ?>

    </div>
</body>

</html>