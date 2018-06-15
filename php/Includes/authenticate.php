<?php
require_once './php/includes/init.php';
use php\Sessions\AutoLogin;

print_r($_SESSION);

if(isset($_SESSION['authenticated']) || isset($_SESSION['backyard_auth'])) {
    //we're ok
}else {
    $autologin = new AutoLogin($db);
    $autologin->checkCredentials();
    if(!isset($_SESSION['backyard_auth'])){
        header('Location: login.php');
        exit;
    }
}
?>