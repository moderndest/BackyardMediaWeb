<?php
require_once './php/includes/authenticate.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Restricted Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
</head>
<body>
    <h1> Restricted Page </h1>
    <?php include './php/includes/logout_button.php';?>
    <p>Hi, <?= htmlentities($_SESSION['username']);?></p>
    <p><a href="restricted2.php"> Go to page 2</a></p>
    
</body>
</html>