<?php

spl_autoload_register(function ($class) {
	if (strpos($class, "Controller") !== false || $class == 'App')
		include_once "controller/".$class.".php";
    else
		include_once "model/".$class.".php";
});

$database = 'mysql:host=database:3306';
$_db_name = $_ENV['MYSQL_DATABASE'];
$_db_login = $_ENV['MYSQL_USER'];
$_db_pass = $_ENV['MYSQL_PASSWORD'];
$_db_schema= "public";
$db = new PDO($database, $_db_login, $_db_pass);
$db->query("SET search_path TO $_db_schema;");

function db() { global $db; return $db; }