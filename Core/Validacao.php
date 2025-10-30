<?php

namespace Core;

class Validacao
{
    public $validacoes = [];

    public static function validar($regras, $dados)
    {
        $validacao = new self;
        //nome do campo e regras[]

        foreach ($regras as $campo => $regrasDoCampo) {

            foreach ($regrasDoCampo as $regra) {

                $valorDoCampo = $dados[$campo];

                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } else if (str_contains($regra, ':')) {
                    $temp = explode(':', $regra); //quebra uma string em um array usando um separador
                    $regra = $temp[0];
                    $regraArgumento = $temp[1];

                    $validacao->$regra($regraArgumento, $campo, $valorDoCampo);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
            }
        }

        return $validacao;
    }

    private function required($campo, $valor)
    {
        if (strlen($valor) == 0) {
            $this->addError($campo, "O campo $campo é obrigatório.");
        }
    }

    private function email($campo, $valor)
    {
        if (! filter_var($valor, FILTER_VALIDATE_EMAIL)) { //FILTER_VALIDATE_EMAIL: filtro que verifica se $valor é um email válido.
            $this->addError($campo, "O campo $campo é inválido.");
        }
    }

    private function confirmed($campo, $valor, $valorDeConfirmacao)
    {
        if ($valor != $valorDeConfirmacao) {
            $this->addError($campo, "O $campo de confirmação está diferente.");
        }
    }

    private function unique($tabela, $campo, $valor)
    {
        if (strlen($valor) == 0) {
            return;
        }

        $db = new Database(config('database')); //Dentro de métodos de classe o PHP não consegue ver variáveis globais automaticamente.

        $resultado = $db->query(
            query: "select * from $tabela where $campo = :valor",
            params: ['valor' => $valor]
        )->fetch();

        if($resultado) {
            $this->addError($campo, "O campo $campo já está sendo usado");
        }
    }

    private function min($min, $campo, $valor)
    {
        if (strlen($valor) <= $min) {
            $this->addError($campo, "O campo $campo precisa ter no mínimo $min caracteres.");
        }
    }

    private function max($max, $campo, $valor)
    {
        if (strlen($valor) > $max) {
            $this->addError($campo, "O campo $campo precisa ter no máximo $max caracteres.");
        }
    }

    private function strong($campo, $valor)
    {
        if (! strpbrk($valor, "!#$%&'()*+,-./:;<=>?@[\]^_`{|}~")) { //procura qualquer caractere de uma lista dentro de uma string
            $this->addError($campo, "A $campo precisa ter um caractere especial nela.");
        }
    }

    private function addError($campo, $erro) {
        $this->validacoes[$campo][] = $erro;
    }

    public function naoPassou($nomeCustomizado = null)
    {
        $chave = 'validacoes';

        if ($nomeCustomizado) {
            $chave .= '_' . $nomeCustomizado;
        }

        flash()->push($chave, $this->validacoes);
        return sizeof($this->validacoes) > 0;
    }
}
