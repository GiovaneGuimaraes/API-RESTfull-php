<?php

require_once(__DIR__ . "/config/header.php");
require_once(__DIR__ . "/config/verbs.php");
require_once(__DIR__ . "/config/utils.php");
require_once(__DIR__ . "/config/BancoDados.php");
require_once(__DIR__ . "/model/Autor.php");
require_once(__DIR__ . "/model/Livro.php");

// Cadastrar um novo livro.
if (isMetodo("POST")) {
    try {
        if (!parametrosValidos($_POST, ["nomelivro","genero","ano","idPessoa"])) {
            throw new Exception("Parâmetros incorretos", 400);
        }
        //checar se livro existe
        $res = Livro::cadastrar($_POST["nomelivro"], $_POST["genero"], $_POST["ano"], $_POST["idPessoa"]);
        if (!$res) {
            throw new Exception("Livro não pode ser cadastrada", 500);
        }

        output(200, ["msg" => "Livro cadastrado com sucesso"]);

    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}

// Editar um livro.
if (isMetodo("PUT")) {
    try {
        if (!parametrosValidos($_PUT, ["idlivro", "nomelivro", "genero", "ano", "idPessoa" ])) {
            throw new Exception("Parâmetros incorretos", 400);  
        }
        if (!Livro::existe($_PUT["idlivro"])) {
            throw new Exception("O livro não existe", 400);
        }
        $res = Livro::editar($_PUT["idlivro"], $_PUT["nomelivro"], $_PUT["genero"], $_PUT["ano"], $_PUT["idPessoa"]);
        if (!$res) {
            throw new Exception("O livro não pode ser editada", 500);
        }
        output(200, ["msg" => "Livro editado com sucesso"]);
    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}

if (isMetodo("GET")) {
    output(200, Livro::listar());
}

if (isMetodo("DELETE")) {
    try {
        if (!parametrosValidos($_DELETE, ["idlivro"])) {
            throw new Exception("Parâmetros incorretos", 400);
        }
        if (!Livro::existe($_DELETE["idlivro"])) {
            throw new Exception("O livro não existe", 400);
        }
        $res = Livro::deletar($_DELETE["idlivro"]);
        if (!$res) {
            throw new Exception("O livro não pode ser deletado", 500);
        }
        output(200, ["msg" => "Livro deletado com sucesso"]);
    } catch (Exception $e) {
        output($e->getCode(), ["msg" => $e->getMessage()]);
    }
}