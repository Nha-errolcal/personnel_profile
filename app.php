<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = "/personnel_profile";
$path = str_replace($basePath, "", $uri);
$path = rtrim($path, '/') ?: '/';

$routes = [
    '/' => './template/view/home/home.php',
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    http_response_code(404);
    require "./template/view/errors/404.php";
}
