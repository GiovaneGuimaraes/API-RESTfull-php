<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    </style>

    <nav>
        <ul>
            <li><a href="livraria">Home</a></li>
            <li><a href="cadastrarAutor">Cadastrar novo Autor</a></li>
            <li><a href="cadastrarLivro">Cadastrar novo Livro</a></li>
            <li><a href="livros">Lista de livros</a></li>
            <li><a href="autores">Lista de autores</a></li>
        </ul>
    </nav>  

    <?php

        require_once(__DIR__."/model/Autor.php");

        if(isset($_GET["id"]) and !empty($_GET["id"])) {

            if(!Autor::existe($_GET["id"])) {
                echo "<h1>O autor especificado não existe!</h1>";
                exit;
            }
            $resultado = Autor::deletar($_GET["id"]);
            if($resultado) {
                echo "<h1>Autor deletado com sucesso!</h1>";
            } else {
                echo "<h1>Erro ao deletar Autor</h1>";
            }
        } else {
            echo "<h1>Você deve especificar Autor!</h1>";
            exit;
        }
    ?>
    
    <footer>
        <div class="container_footer">
            <p>Developer by: Giovane M. Guimarães 3030261</p>
            <p>Developer by: Pedro A. dos Reis Alvarez 3030288</p>
            <p>Aluno de Análise e desenvolvimento de sistema IFSP - São Carlos</p>
        </div>
    </footer>
</body>
</html>