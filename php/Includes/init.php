<?php
use php\Sessions\PersistentSessionHandler;

require_once __DIR__ . '/Psr4AutoloaderClass.php';
require_once __DIR__ . '/connectDB.php';

$loader = new Psr4AutoloaderClass();
$loader->register();
$loader->addNamespace('php', __DIR__ . '/../../php');

$handler = new PersistentSessionHandler ($db);
session_set_save_handler($handler);
session_start();
$_SESSION['active'] = time();

?>