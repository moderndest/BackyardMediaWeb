<?php
require_once __DIR__ . '/init.php';

use php\Sessions\AutoLogin;

if(isset($_SESSION['authenticated']) || isset($_SESSION['backyard_auth'])) {
    //we're ok
}else {
    $autologin = new AutoLogin($db);
    $autologin->checkCredentials();
    if(!isset($_SESSION['parsclick_auth'])){
        header('Location: login.php');
        exit;
    }
}
?>