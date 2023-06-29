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

        .botao_deletar{
            background-color: #e4605e;
        }

        .botao_deletar:hover{
            background-color: #f34336;
        }

    </style>

    <?php 
            require_once(__DIR__."/model/Autor.php");
            require_once(__DIR__."/model/Livro.php");  
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

    <h1>Lista de autores</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $listaPessoas = Autor::listar();

                    foreach($listaPessoas as $pessoa) {
                        echo "<tr>";
                        echo "<td>" . $pessoa["id"] . "</td>";
                        echo "<td>" . $pessoa["nome"] . "</td>";
                        echo "<td><button class='botao_deletar'><a href='deletarAutor".$pessoa["id"]."'>Deletar</a></button></td>";
                        echo "<td><button><a href='editarAutor" .$pessoa["id"]."'>Editar</a></button></td>";
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