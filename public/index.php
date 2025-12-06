<?php
require __DIR__ . '/../vendor/autoload.php';

use Center\MiniFramework\Core\Application;
use Center\MiniFramework\Http\Controllers\HomeController;
use Center\MiniFramework\Http\Controllers\UserController;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$app = new Application();
$app->router()->get('/',[HomeController::class,'index']);
$app->router()->get('/users/create', [UserController::class, 'createForm']);
$app->router()->get('/users/{id}/edit', [UserController::class, 'edit']);
$app->router()->get('/users/{id}', [UserController::class, 'show']);
$app->router()->post('/users', [UserController::class, 'store']);
$app->router()->get('/users', [UserController::class, 'index']);
$app->router()->post('/users/{id}/update', [UserController::class, 'update']);
$app->router()->post('/users/{id}/delete', [UserController::class, 'delete']);

$app->run();
