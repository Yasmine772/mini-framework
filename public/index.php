<?php

use Center\MiniFramework\Core\Application;
use Center\MiniFramework\Core\Request;
use Center\MiniFramework\Core\Response;
use Center\MiniFramework\Core\Router;
use Center\MiniFramework\Http\Controllers\TestController;

require __DIR__ . '/../vendor/autoload.php';

$request = new Request();
$response = new Response();
$router = new Router();


$router->get('/users/{id}', [TestController::class, 'show']);

$router->resolve($request, $response);
