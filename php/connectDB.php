<?php
/**
 * 
 * Backyard Media 
 * Filename: ConectDB.php
 * @author Chatsuda Rattarasan
 *
 *
 * Date: June 5 2018 
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 *
 * For the full copyright and license information, please view the LICENSE
 * 
 */
    $dbhost = htmlentities("35.186.178.70"); //Defaults to mysqli.default_host
    $username = htmlentities('BackyardAdmin') ;
    $password = htmlentities('Bymadmin2018') ;
	$database = htmlentities("BackyardMedia"); 
	$socket = htmlentities("mysql:host=$dbhost;dbname=$database");
    
    global $conn;
    try {
        $conn = new PDO($socket, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    if(isset($conn)){
        echo 'Connected!';
    } else if(isset($error)){
        echo $error;
    }
    else{
        echo'Unknown Error!';
    }
?>