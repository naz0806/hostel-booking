<?php


define("HOST", "localhost");     // The host you want to connect to.
define("USER", "root");    // The database username. 
define("PASSWORD", "");    // The database password. 
define("DATABASE", "facility");    // The database name.

try {
	$connect = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}


?>
