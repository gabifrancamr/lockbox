<?php

class Database
{
    private $db;

    public function __construct($config)
    {
        $this->db = new PDO($this->getDsn($config));
    }

    private function getDsn($config) { //recebe $config, que é um array de configuração do banco de dados
        $driver = $config['driver'];

        unset($config['driver']); //significa “remover a chave driver do array $config”.

        $dsn = $driver . ':' . http_build_query($config, '', ';'); //http_build_query($config, '', ';') transforma o array em uma string de parâmetros, separando cada par chave=valor com ; no lugar de &.

        //mysql:host=localhost;port=3306;dbname=bookwise

        if ($driver == 'sqlite') {
            $dsn = $driver . ':' . $config['database'];
        }

        return $dsn;
    }

    public function query($query, $class = null, $params = [])
    {
        $prepare = $this->db->prepare($query); //Cria um prepared statement (declaração preparada)

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class); //PDO::FETCH_CLASS = Transforma resultados do banco em objetos das classes, exemplo : Quando faz Livro::all(), cada linha vira um objeto Livro
        }

        $prepare->execute($params); //Substitui os placeholders pelos valores reais, Executa a query no banco de dados

        return $prepare;
    }
}

$database = new Database(config('database'));
