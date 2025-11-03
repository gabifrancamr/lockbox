<?php

use Core\Route;
use App\Controllers\LoginController;
use App\Controllers\IndexController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notas;
use App\Middlewares\AuthMiddleware;
use App\Middlewares\GuestMiddleware;

(new Route())
    //não autenticado
    ->get('/', IndexController::class, GuestMiddleware::class)
    ->get('/login', [LoginController::class, 'index'], GuestMiddleware::class)
    ->post('/login', [LoginController::class, 'login'], GuestMiddleware::class)
    ->get('/registrar', [RegisterController::class, 'index'], GuestMiddleware::class)
    ->post('/registrar', [RegisterController::class, 'register'], GuestMiddleware::class)
    
    //autenticado
    ->get('/notas', Notas\IndexController::class, AuthMiddleware::class)
    ->get('/notas/criar', [Notas\CriarController::class, 'index'], AuthMiddleware::class)
    ->post('/notas/criar', [Notas\CriarController::class, 'store'], AuthMiddleware::class)
    ->get('/logout', LogoutController::class, AuthMiddleware::class)


    ->run();
