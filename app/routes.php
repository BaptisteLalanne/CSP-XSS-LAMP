<?php

$app = new App();

// mes routes
$app->route("home", "HomeController", "index");
$app->route("jsonp", "HomeController", "jsonp");
$app->route("image", "HomeController", "image");
$app->route("dangling", "HomeController", "dangling");

// 404 si aucune route ne correspond
$app->notfound();