<?php

use Test\Router;

require "vendor/autoload.php";

$routes = [
    "/books" => "BookController@index",
    "/authors" => "AuthorController@index"
];

$router = new Router($routes);
$router->route();
