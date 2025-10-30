<?php

use Core\Route;
use App\Controllers\DashboardController;
use App\Controllers\LoginController;
use App\Controllers\IndexController;
use App\Controllers\LogoutController;
use App\Controllers\RegisterController;
use App\Controllers\Notas;

(new Route())
    ->get('/', IndexController::class)

    ->get('/login', [LoginController::class, 'index'])
    ->post('/login', [LoginController::class, 'login'])

    ->get('/dashboard', DashboardController::class)
    ->get('/notas/criar', [Notas\CriarController ::class, 'index'])
    ->post('/notas/criar', [Notas\CriarController ::class, 'store'])

    ->get('/logout', LogoutController::class)

    ->get('/registrar', [RegisterController::class, 'index'])
    ->post('/registrar', [RegisterController::class, 'register'])

    ->run();
