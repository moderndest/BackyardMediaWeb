<?php
use php\Sessions\MysqlSessionHandler;

require_once './connectDB.php';
require_once './Sessions/MysqlSessionHandler.php';

$handler = new MysqlSessionHandler($db);
session_set_save_handler($handler);

// initialize session
session_start();

// create session variable if form has been submitted
if(isset($_POST['first_name'])){
    if(!empty($_POST['first_name'])){
        $_SESSION['first_name'] = htmlentities($_POST['first_name']);

    } else {
        $_SESSION['first_name'] = 'bashful';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Session Test </title>
</head>
<body>
    <p>Hello, <?php
    if(isset($_SESSION['first_name'])){
        echo $_SESSION['first_name'];

    } else {
        echo 'stranger';
    }
    ?></p>
    <p><a href= "session_03.php"> Go to page 3</a></p>
</body>
</html>