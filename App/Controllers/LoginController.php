<?php

namespace App\Controllers;

class LoginController
{
    public function index()
    {
        return view('login');
    }


    public function login()
    {
        echo "LoginController.login";
    }
}
