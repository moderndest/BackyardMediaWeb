<?php
    $dbhost = "35.186.178.70"; //Defaults to mysqli.default_host
    // $username = getenv('MYSQL_USER');
    $username = 'backyardmedia' ;
    $password = 'backyardmedia2018' ;
	// $password = getenv('MYSQL_PASSWORD');
	$database = "BackyardMedia"; 
	$socket = "mysql:host=$dbhost;dbname=$database";
    
    global $conn;
    try {
        $conn = new PDO($socket, $username, $password);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>