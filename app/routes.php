<?php

$app = new App();

// mes routes
$app->route("home", "HomeController", "index");
$app->route("jsonp", "HomeController", "jsonp");
$app->route("image", "HomeController", "image");

// dangling markup routes
$app->route("dangling_home", "DanglingMarkupController", "index");
$app->route("dangling_insert", "DanglingMarkupController", "insert");
$app->route("dangling_clear", "DanglingMarkupController", "clear");

// 404 si aucune route ne correspond
$app->notfound();