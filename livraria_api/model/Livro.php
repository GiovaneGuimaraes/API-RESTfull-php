<?php

require_once(__DIR__."/../config/BancoDados.php");



class Livro {

    
    public static function cadastrar($nomelivro, $genero, $ano, $idPessoa) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("INSERT INTO livro(nomelivro,genero,ano,idPessoa) VALUES (:nomeLivro, :generoLivro, :anoLivro, :idAutor)");
            $stmt->execute(
                [
                    "nomeLivro" => $nomelivro,
                    "generoLivro" => $genero,
                    "anoLivro" => $ano,
                    "idAutor" => $idPessoa,
                ]
            );
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

    public static function editar($idlivro, $nome, $genero, $ano, $idPessoa) {

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("UPDATE livro SET nomelivro = ?, genero = ?, ano = ?, idPessoa = ? WHERE idlivro = ?");
            $stmt->execute([$nome, $genero, $ano, $idPessoa, $idlivro]);
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

    public static function listar() {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro ORDER BY nomelivro");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listarBuscaAno($pesquisa) {

        //$pesquisa = $_POST['anobusca'];
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro WHERE ano LIKE ?");
            $stmt->bindParam(1, $pesquisa);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listarBuscaGenero($pesquisa) {

        //$pesquisa = $_POST['generobusca'];
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro WHERE genero LIKE ?");
            $stmt->bindParam(1, $pesquisa);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listarBuscaLivroAutor($pesquisa) {

        //$pesquisa = $_POST['idPessoa'];
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro WHERE idPessoa LIKE ?");
            $stmt->bindParam(1 , $pesquisa);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function listarBuscaLivroAutor2($pesquisa) {

        // $listaAutor = Autor::listarBuscaID();
        // foreach($listaAutor as $autor){
        //     $pesquisa = $autor["id"];
        // }

        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro WHERE idPessoa LIKE ?");
            $stmt->bindParam(1, $pesquisa);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }


    public static function getLivro($idlivro) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT * FROM livro WHERE idlivro = ?");
            $stmt->execute([$idlivro]);

            return $stmt->fetchAll()[0];
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function existe($idlivro) {
        try {
            $con = Conexao::getConexao();
            $stmt = $con->prepare("SELECT COUNT(*) FROM livro WHERE idlivro = ?");
            $stmt->execute([$idlivro]);

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

    public static function deletar($idlivro) {
        try {
            $conexao = Conexao::getConexao();
            $conexao->beginTransaction();

            $stmt = $conexao->prepare("DELETE FROM livro WHERE idlivro = ?");
            $stmt->execute([$idlivro]);

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
}