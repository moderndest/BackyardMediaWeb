<?php
/**
 * Backyard Media 
 * Filename: authenticate.php
 * 
 * @author Chatsuda Rattarasan
 * 
 * Credits
 * 
 * Created for the Everything About Backyard Media Sites
 * 
 * Date created: June 13 2018 
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 *
 * For the full copyright and license information, please view the LICENSE
 */
require_once './php/includes/init.php';
use php\Sessions\AutoLogin;


if(isset($_SESSION['authenticated']) || isset($_SESSION['backyard_auth'])) {
    //we're ok
}else {
    $autologin = new AutoLogin($db);
    $autologin->checkCredentials();
    if(!isset($_SESSION['backyard_auth'])){
        //header('Location: index.php');
       // exit;
    }
}
?>