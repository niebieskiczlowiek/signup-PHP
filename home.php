<?php
require_once 'includes/config_session.inc.php';

if (  !(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) ) {
    header("Location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
    <?php
        echo "<h3>Welcome to the home page " . $_SESSION["user_username"] . "!";
    ?>

    <h3>Logout</h3>
    <form action="includes/logout.inc.php" method="POST">
        <button>Logout</button>
    </form>

</body>
</html>