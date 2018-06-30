<?php
/**
 * 
 * Backyard Media 
 * Filename: ConectDB.php
 * @author Chatsuda Rattarasan
 *
 * This file 
 *
 * Date: June 5 2018 
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 *
 * For the full copyright and license information, please view the LICENSE
 * 
 */


    $dbhost = htmlentities("localhost"); 
    $username = htmlentities('username') ;
    $password = htmlentities('pwd') ;
	$database = htmlentities("databasename"); 
	$socket = htmlentities("mysql:host=$dbhost;dbname=$database");

    //Connect to Database
    try {
        $db = new PDO($socket, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>