<?php

//receber formulário com email e senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $validacao = Validacao::validar([

        'email' => ['required', 'email'],
        'senha' => ['required']

    ], $_POST);


    if($validacao->naoPassou('login')) {
        header('location: /login');
        exit();
    }

    //consultar banco de dados com e-mail e senha
    $usuario = $database->query(
        query: " select * 
        from usuarios
        where email = :email ",
        class: Usuario::class,
        params: compact('email')

    )->fetch();


    if ($usuario) {
        //se existir, adicionar na sessão que usuário está autenticado 
        
        //validar a senha
        if(! password_verify($_POST['senha'], $usuario->senha)) {
            flash()->push('validacoes_login', ['Usuário ou senha estão incorretos!']);
            header('location: /login');
            exit();
        }
        
        $_SESSION['auth'] = $usuario;

        flash()->push('mensagem', 'Seja bem vindo ' . $usuario->nome . '!');

        header('Location: /');

        exit();
    }
}

view('login');
