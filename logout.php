
<!--
    - Backyard Media 
    - Filename: login.php
    - @author: Chatsuda Rattarasan
    - Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
    - Date: June 15 2018    
    - For the full copyright and license information, please view the LICENSE
-->
<?php
use php\Sessions\MysqlSessionHandler;

require_once './php/Includes/connectDB.php';
require_once './php/Sessions/MysqlSessionHandler.php';

$handler = new MysqlSessionHandler($db);
session_set_save_handler($handler);
// initialize session
session_start();


if (isset($_POST['logout'])){
    $_SESSION = [];
    $params = session_get_cookie_params();
    setcookie(session_name(),'',time() - 86400, $params['path'],
        $params['domain'], $params['secure'],$params['httponly']);
    session_destroy();
    header('Location: index.php');
    exit;
}
?>