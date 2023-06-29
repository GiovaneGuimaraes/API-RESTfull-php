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
        margin-top: 5.7%;
        }

        table, th, td {
        border: 1px solid black;
        }

        table {
        border-collapse: collapse;
        margin: auto;
        margin-bottom: 20px;
        margin-top: 20px;
        }

        th, td{
        padding: 10px;
        text-align: center;
        width: 120px;
        }

        th{
        font-weight: bold;
        }

        button{
            border-radius: 5px;
            padding: 3px 12px;
            background: #5959AB;
            text-decoration: none;
            color: white;
            cursor: pointer;
            width: 100px;
            height: 30px;
        }

        a{
            text-decoration: none;
            color: white;
        }

        button:hover{
            background-color: #4D4DFF;
        }
    
    </style>

    <?php

        require_once(__DIR__."/model/Livro.php");

        if(isset($_POST['generobusca']) && !empty($_POST['generobusca'])) {
            $pesquisa = $_POST['generobusca'];
        } else {
            echo "<h2>Inválido</h2>";
            exit;
        }

        //$pesquisa = $_POST['generobusca'];
        //echo $pesquisa;
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

    <h1>Lista de livros do genero <?php echo $_POST['generobusca']; ?></h1>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nome do livro</th>
                        <th>Genero do livro</th>
                        <th>Ano de publicação</th>
                        <th>ID do Autor</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $genero = $_POST['generobusca'];
                        $listaLivros = Livro::listarBuscaGenero($genero);

                        foreach($listaLivros as $livro) {
    
                            $idlivro = $livro["idlivro"];
    
                            echo "<tr>";
                            echo "<td>" . $livro["nomelivro"] . "</td>";
                            echo "<td>" . $livro["genero"] . "</td>";
                            echo "<td>" . $livro["ano"] . "</td>";
                            echo "<td>" . $livro["idPessoa"] . "</td>";
                            echo "</tr>";
                        }
                    ?>  
                </tbody>
            </table>
        <footer>
            <div class="container_footer">
                <p>Developer by: Giovane M. Guimarães 3030261</p>
                <p>Developer by: Pedro A. dos Reis Alvarez 3030288</p>
                <p>Aluno de Análise e desenvolvimento de sistema IFSP - São Carlos</p>
            </div>
        </footer>
</body>
</html>