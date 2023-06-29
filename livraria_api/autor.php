<?php

require_once(__DIR__ . "/config/header.php");
require_once(__DIR__ . "/config/verbs.php");
require_once(__DIR__ . "/config/utils.php");
require_once(__DIR__ . "/config/BancoDados.php");
require_once(__DIR__ . "/model/Autor.php");

// Cadastrar um novo autor.
if (isMetodo("POST")) {
    try {
        if (!parametrosValidos($_POST, ["nome"])) {
            throw new Exception("Parâmetros incorretos", 400);
        }
        $res = Autor::cadastrar($_POST["nome"]);
        output(200, ["msg" => "Pessoa cadastrada com sucesso"]);

    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}

// Editar um autor.
if (isMetodo("PUT")) {
    try {
        if (!parametrosValidos($_PUT, ["id", "nome"])) {
            throw new Exception("Parâmetros incorretos", 400);
        }
        if (!Autor::existe($_PUT["id"])) {
            throw new Exception("O Autor não existe", 400);
        }
        $res = Autor::editar($_PUT["id"], $_PUT["nome"]);
        if (!$res) {
            throw new Exception("A pessoa não pode ser editada", 500);
        }
        output(200, ["msg" => "Pessoa editada com sucesso"]);
    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}

if (isMetodo("GET")) {
    output(200, Autor::listar());
}

if (isMetodo("DELETE")) {
    try {
        if (!parametrosValidos($_DELETE, ["id"])) {
            throw new Exception("Parâmetros incorretos", 400);
        }
        if (!Autor::existe($_DELETE["id"])) {
            throw new Exception("O Autor não existe", 400);
        }
        $res = Autor::deletar($_DELETE["id"]);
        if (!$res) {
            throw new Exception("O autor não pode ser deletado", 500);
        }
        output(200, ["msg" => "Autor deletado com sucesso"]);
    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}