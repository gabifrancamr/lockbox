<?php

namespace App\Models;

use Core\Database;

class Nota {
    public $id;
    public $usuario_id;
    public $titulo;
    public $nota; 
    public $data_criacao;
    public $data_atualizacao;

    public static function all() {
        $db = new Database(config('database'));

        return $db->query(
            query: "select * from notas where usuario_id = :usuario_id",
            class: self::class,
            params: [
                'usuario_id' => auth()->id
            ]
        )->fetchAll();
    }
}