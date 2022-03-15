<?php

spl_autoload_register(function ($class) {
	if (strpos($class, "Controller") !== false || $class == 'App')
		include_once "controller/".$class.".php";
    else
		include_once "model/".$class.".php";
});

$_db_name = "sere";
$_db_host = "localhost";
$_db_port = "3306";
$_db_login = "tomperr";
$_db_pass = "tomperr";
$_db_schema = "public";

$db = new PDO("mysql:host=$_db_host;dbname=$_db_name;port=$_db_port", $_db_login, $_db_pass);
$db->query("SET search_path TO $_db_schema;");

function db() { global $db; return $db; }