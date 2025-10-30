<?php

use Core\Flash;

function base_path($path){
    return __DIR__ . '/../'. $path;
}

function view($view, $data = [])
{
    
    foreach ($data as $key => $value) {

        $$key = $value;
    }

    require base_path('views/template/app.php');
};

function dd(...$dump)
{
    dump($dump);
    exit();  // Impede que código desnecessário execute
};

function dump(...$dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
};

function abort($code)
{
    http_response_code($code); //Essa função define o código HTTP que o servidor envia pro navegador.
    view($code);
    die();  // Para execução - nada mais roda depois
};

function flash() {
    return new Flash;
}

function config($chave = null) {
    $config = require base_path('config.php');

    if(strlen($chave) > 0) {
        return $config[$chave];
    }

    return $config;
}

function auth() {
    if( !isset($_SESSION['auth'])) {
        return null;
    }

    return $_SESSION['auth'];
}

function old($campo) {
    $post = $_POST;

    if(isset($post[$campo])) {
        return $post[$campo];
    }

    return '';
}