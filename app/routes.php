<?php

$app = new App();

// mes routes
$app->route("home", "HomeController", "index");
$app->route("jsonp", "HomeController", "jsonp");

// image routes
$app->route("image_home", "ImageController", "index");
$app->route("image_insert", "ImageController", "insert");
$app->route("image_clear", "ImageController", "clear");

// dangling markup routes
$app->route("dangling_home", "DanglingMarkupController", "index");
$app->route("dangling_insert", "DanglingMarkupController", "insert");
$app->route("dangling_clear", "DanglingMarkupController", "clear");

// 404 si aucune route ne correspond
$app->notfound();