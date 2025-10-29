<?php

if(!auth()) {
    header('location: /login');

    exit();
}

echo "Estou logado ". auth()->nome;