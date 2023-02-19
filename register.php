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
 
    <form action="register_request.php" method="post">
            <input name="username" type="text" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <input type="submit" value="REGISTER">
    </form>
    <p><a href="login.php">LOG IN</a></p>
    </div>

</body>

</html>