<?php


define("HOST", "remotemysql.com");     // The host you want to connect to.
define("USER", "WsqYvA1veb");    // The database username. 
define("PASSWORD", "LuOGvcevAL");    // The database password. 
define("DATABASE", "WsqYvA1veb");    // The database name.

try {
	$connect = new PDO('mysql:host='.HOST.';dbname='.DATABASE, USER, PASSWORD);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch (PDOException $e) {
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}


?>
