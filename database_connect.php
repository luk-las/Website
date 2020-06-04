<?php

$config = require_once 'database_config.php';

try{
	
	$db = new PDO(
		"mysql:host={$config['host']};dbname={$config['database']}", 
		$config['user'], 
		$config['password'], 
		[PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
	);
	
	$db->exec("set names utf8");
	
	
} catch (PDOException $error) {
	
	echo $error->getMessage();
	exit('Database error');
	
}