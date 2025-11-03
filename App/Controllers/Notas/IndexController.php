<?php

namespace App\Controllers\Notas;

class IndexController {
    public function __invoke()
    {
        if(!auth()) {
            redirect('/login');

            exit();
        }

        return view('notas', [
            'user' => auth()
        ]);
    }
}