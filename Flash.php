<?php

/**
 * O Flash é uma forma de armazenar mensagens temporárias na sessão ($_SESSION) — 
 * mensagens que você quer exibir apenas uma vez (na próxima requisição) e 
 * depois apagar automaticamente.
 */

class Flash
{
    public function push($chave, $valor)
    {
        $_SESSION["flash_$chave"] = $valor;
    }

    public function get($chave)
    {
        if (!isset($_SESSION["flash_$chave"])) {
            return false;
        }

        $valor = $_SESSION["flash_$chave"];

        unset($_SESSION["flash_$chave"]); //apaga mensagem de session

        return $valor;
    }
}
