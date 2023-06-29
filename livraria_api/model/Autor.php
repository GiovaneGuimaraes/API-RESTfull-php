<?php

require_once(__DIR__."/../config/BancoDados.php");

class Autor {

    public static function cadastrar($nome) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("INSERT INTO autor(nome) VALUES (?)");
            $stmt->execute([$nome]);
            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }            

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function existe($id) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT COUNT(*) FROM autor WHERE id = ?");
            $stmt->execute([$id]);

            if($stmt->fetchColumn() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listar() {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM autor");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listarBuscaID($pesquisa) {

        //$pesquisa = $_POST['nomebusca'];
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM autor WHERE nome LIKE ?");
            $stmt->bindParam(1, $pesquisa);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function deletar($id) {
        try {
            $conexao = Conexao::getConexao();
            $conexao->beginTransaction();

            $stmt = $conexao->prepare("DELETE FROM livro WHERE idPessoa = ?");
            $stmt->execute([$id]);

            $stmt = $conexao->prepare("DELETE FROM autor WHERE id = ?");
            $stmt->execute([$id]);

            $conexao->commit();
            
            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $conexao->rollback();
            echo $e->getMessage();
            exit;
        }
    }

    public static function getAutor($id) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM autor WHERE id = ?");
            $stmt->execute([$id]);

            return $stmt->fetchAll()[0];
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function editar($id, $nome) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("UPDATE autor SET nome = ? WHERE id = ?");
            $stmt->execute([$nome, $id]);
            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }            

        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}