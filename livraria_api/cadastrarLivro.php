<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria IFSP</title>
</head>
<body>

    <style>
        * {
        padding:0;
        margin:0;
        font-family: monospace;
        }
        h1{
            text-align: center;
            padding-top: 13px;
        }
        nav {
        background-color: #333;
        height: 50px;
        width: 100%;
        padding: 0 20px;
        font-size: large;
        }

        ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        }

        li {
        float: left;
        }

        li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        border-radius: 5px;
        }

        li a:hover {
        background-color: #111;
        }

        footer {
        text-align: center;
        background-color: #7a297a;
        color: aliceblue;
        padding: 10px;
        height: 50px;
        width: 100%;
        margin-top: 7%;
        }

        button{
            border-radius: 5px;
            padding: 3px 12px;
            background: #5959AB;
            text-decoration: none;
            color: white;
            cursor: pointer;
            width: 140px;
            height: 35px;
            margin-left: 1%;
        }

        a{
            text-decoration: none;
            color: white;
        }

        button:hover{
            background-color: #4D4DFF;
        }


        form{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
            font-size: large;
            
        }
        input{
            margin-left: 1%;
            width: 200px;
            height: 30px;
        }

        .p_form{
            margin-left: 1%;
        }

        select{
            margin-left: 1%;
            width: 200px;
            height: 30px;
        }

    </style>

    <?php

    require_once(__DIR__."/model/Autor.php");
    require_once(__DIR__."/model/Livro.php");


    //cadastro de livros
    if(isset($_POST["nomelivro"]) and !empty($_POST["nomelivro"]) and
    isset($_POST["genero"]) and !empty($_POST["genero"]) and
    isset($_POST["ano"]) and !empty($_POST["ano"]) and
    isset($_POST["idPessoa"]) and !empty($_POST["idPessoa"]) 

    ) {
        $nomelivro = $_POST["nomelivro"];
        $genero = $_POST["genero"];
        $ano = $_POST["ano"];
        $idPessoa = $_POST["idPessoa"];

        if(!Autor::existe($idPessoa)) {
            echo "<p>Autor não pode ser cadastrado!</p>";
        } else {
            $resultado = livro::cadastrar($nomelivro, $genero, $ano, $idPessoa);
            
            if($resultado) {
                echo "<script>alert('Cadastro realizado com sucesso!'); </script>";
            } else {
                echo "<p>Falha no cadastro</p>";
            }
        }

    }
    ?>

    <nav>
        <ul>
            <li><a href="livraria">Home</a></li>
            <li><a href="cadastrarAutor">Cadastrar novo Autor</a></li>
            <li><a href="cadastrarLivro">Cadastrar novo Livro</a></li>
            <li><a href="livros">Lista de livros</a></li>
            <li><a href="autores">Lista de autores</a></li>
        </ul>
    </nav> 

    <h1>Cadastrar um novo livro</h1>
        <form method="POST">
            <p class='p_form'>Digite o nome</p>
            <input type="text" name="nomelivro" required>
            <p class='p_form'>Digite o genero</p>
            <input type="text" name="genero" required>
            <p class='p_form'>Digite o ano</p>
            <input type="number" name="ano" min="0" max="2023" required>
            <p class='p_form'>Digite o Autor</p>
            <select name="idPessoa" required>
                <option value=""></option>
                <?php
                    $listaPessoas = Autor::listar();

                    foreach($listaPessoas as $pessoa) {
                        $id = $pessoa["id"];
                        $nome = $pessoa["nome"];

                        echo "<option value='$id'>$nome</option>";
                    }
                ?>
            </select>
            <br>
            <button>Cadastrar</button>
        </form>
    
    <footer>
        <div class="container_footer">
            <p>Developer by: Giovane M. Guimarães 3030261</p>
            <p>Developer by: Pedro A. dos Reis Alvarez 3030288</p>
            <p>Aluno de Análise e desenvolvimento de sistema IFSP - São Carlos</p>
        </div>
    </footer>
</body>
</html>