<?php

use Core\Route;
use App\Controllers\LoginController;
use App\Controllers\IndexController;

(new Route())
    ->get('/', IndexController::class)

    ->get('/login', [LoginController::class, 'index'])
    ->post('/login', [LoginController::class, 'login'])

    ->run();

    die();

$controller = str_replace('/', '', parse_url($_SERVER['REQUEST_URI'])['path']); // parse_url($_SERVER['REQUEST_URI'])['path'] = Aqui ele pega só o caminho da URL, sem a query string.

if (!$controller) $controller = 'index';

if (! file_exists("../controllers/{$controller}.controller.php")) {
    abort(404);
};

require "../controllers/{$controller}.controller.php";
