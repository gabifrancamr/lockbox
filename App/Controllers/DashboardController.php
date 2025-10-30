<?php

namespace App\Controllers;

class DashboardController {
    public function __invoke()
    {
        if(!auth()) {
            redirect('/login');

            exit();
        }

        echo "Estou logado ". auth()->nome;
    }
}