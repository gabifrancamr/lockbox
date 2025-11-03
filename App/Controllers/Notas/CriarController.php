<?php

namespace App\Controllers\Notas;

use Core\Database;
use Core\Validacao;

class CriarController
{
    public function index()
    {
        return view('notas/criar');
    }

    public function store()
    {
        $validacao = Validacao::validar([

            'titulo' => ['required', 'min:3', 'max:255'],
            'nota' => ['required']

        ], $_POST);

        if ($validacao->naoPassou()) {
            return view('notas/criar');
        }

        $database = new Database(config('database'));

        $database->query(
            query: "insert into notas (usuario_id, titulo, nota, data_criacao, data_atualizacao) 
            values ( :usuario_id, :titulo, :nota, :data_criacao, :data_atualizacao )",
            params: [
                'usuario_id' => auth()->id,
                'titulo' => $_POST['titulo'],
                'nota' => $_POST['nota'],
                'data_criacao' => date('Y-m-d H:i:s'),
                'data_atualizacao' => date('Y-m-d H:i:s'),
            ]
        );

        flash()->push('mensagem', 'Nota criada com sucesso!');

        return redirect('/notas');
    }
}
