<?php
    $dbhost = "35.186.178.70"; //Defaults to mysqli.default_host
    $username = 'BackyardAdmin' ;
    $password = 'Bymadmin2018' ;
	$database = "BackyardMedia"; 
	$socket = "mysql:host=$dbhost;dbname=$database";
    
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