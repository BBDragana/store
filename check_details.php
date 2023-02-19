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
    </div>

    <script>
        console.log(<?php echo $_POST['articles'];  ?>);
        console.log(<?php echo $_POST['check_items'];  ?>);
    </script>


</body>

</html>