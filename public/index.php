<?php

require "../Core/functions.php";


// Registra uma função anônima que o PHP vai chamar automaticamente
// sempre que uma classe for usada e ainda não estiver carregada.
spl_autoload_register(function($class) {
    // Substitui as barras invertidas do namespace (\) por barras normais (/)
    // Isso transforma, por exemplo, "Core\Database" → "Core/Database"
    // DIRECTORY_SEPARATOR garante compatibilidade com qualquer sistema (Windows/Linux/Mac)
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // Monta o caminho completo até o arquivo da classe
    // e o inclui (require) para que o PHP possa usá-la.
    // Exemplo: require "/caminho/do/projeto/Core/Database.php"
    require base_path("{$class}.php");
});

session_start(); 

require '../routes.php';

