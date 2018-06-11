<?php
    $dbhost = "MYSQL_HOST"; //Defaults to mysqli.default_host
	$username = "MYSQL_USER";
	$password = "MYSQL_PASSWORD";
	$database = "BackyardMedia"; 
	$socket = "mysql:host=$dbhost;dbname=BackyardMedia";
    
    global $conn;
    try {
        $conn = new PDO($socket, $username, $password);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>