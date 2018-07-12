<?php

use Test\Route;
use Test\Router;

require "vendor/autoload.php";

$routes = [
    "/books" => "BookController@index",
    "/authors" => "AuthorController@index"
];

if (!array_key_exists($_SERVER["REQUEST_URI"], $routes))
    die("Route not found");

$route = new Route($routes[$_SERVER["REQUEST_URI"]]);
$router = new Router($route);

try {
    $router->route();
} catch (Exception $e) {
    echo "<div style='padding: 10px 20px; margin: 50px auto; width: 800px; background: #ffb766;'>";
    echo "Error: ";
    echo $e->getMessage();
    echo "<br/>";
    echo "File: ";
    echo $e->getFile();
    echo " on line ";
    echo $e->getLine();
    echo "</div>";
}
