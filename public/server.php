<?php
$_SERVER["HOMEPATH"] = "~";

/**
 * 🎯 Propósito: Configurar uma variável de ambiente do servidor antes de cada requisição
 * $_SERVER: É uma variável superglobal do PHP que contém informações sobre o servidor e ambiente
 * ["HOMEPATH"]: Acessa/define a chave "HOMEPATH" no array $_SERVER
 * = "~": Atribui o valor "~" (til) a essa chave
 * 
 * Que outras informações o $_SERVER contém?
 * $_SERVER['REQUEST_URI'] - URL acessada
 * $_SERVER['REMOTE_ADDR'] - IP do usuário
 * $_SERVER['HTTP_USER_AGENT'] - Navegador do usuário
 * 
 * Algumas aplicações esperam que HOMEPATH esteja definido
 * Em alguns servidores Windows, HOMEPATH pode ser algo como "C:\Users\usuario"
 * Definindo como "~" simula um ambiente Unix ou padroniza o comportamento
 */