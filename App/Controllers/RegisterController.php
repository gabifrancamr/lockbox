<?php

namespace App\Controllers;

class RegisterController
{
    public function index()
    {
        return view('registrar');
    }

    public function register()
    {
        echo "registerController.login";
    }
}
