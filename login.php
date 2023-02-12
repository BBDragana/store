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
        <form action="login_request.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="LOG IN">
        </form>
        <p><a href="register.php">REGISTER</a></p>
    </div>

    <?php include("includes/footer.php"); ?>

</body>

</html>