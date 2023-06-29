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
        margin-top: 16%;
        }

        .botao_input{
            border-radius: 5px;
            padding: 3px 12px;
            background: #5959AB;
            text-decoration: none;
            color: white;
            margin-top: 3%;
            cursor: pointer;
            width: 100px;
            height: 30px;
            margin-left: 50px;
        }

        .botao_input:hover{
            background-color: #4D4DFF;
        }

        .busca{
            display: flex;
            margin-left: 43%;
            margin-top: 2%;
            font-size: medium;
        }

        .text_input{
            width: 200px;
            height: 30px;
        }

        select{
            width: 200px;
            height: 30px;
        }

    </style>
    
    <?php
        $rota = ($_GET['url']) ?? '';
        //var_dump($rota);

        require_once(__DIR__."/model/Autor.php");
        require_once(__DIR__."/model/Livro.php");

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

    <main> 
        <div class='conteudo_principal'>
            <nav>
                <ul>
                    <li><a href="livraria">Home</a></li>
                    <li><a href="cadastrarAutor">Cadastrar novo Autor</a></li>
                    <li><a href="cadastrarLivro">Cadastrar novo Livro</a></li>
                    <li><a href="livros">Lista de livros</a></li>
                    <li><a href="autores">Lista de autores</a></li>
                </ul>
            </nav>

            <header>
            <h1>Bem vindo a livraria IFSPzada!</h1>
            </header>

            <!-- busca por ano -->
            <div class='busca'>  
                <form method="POST" action= "buscarPorAno"> 
                    <h2>Busca por ano</h2>
                    <input class='text_input' type="number" name="anobusca" min="0" placeholder="digite o ano" required>
                    <br>
                    <input class='botao_input' type="submit" value="buscar">
                </form>
            </div>

            <!-- buscar por autor -->
            <div class='busca'>
                <form method="POST" action="buscarLivrosPorAutor">
                    <h2>Busca livro por autor</h2>
                    <input class='text_input' type="text" name="nomebusca" placeholder="digite o nome">
                    <select name="idPessoa">
                    <option class='text_input' value=""></option>
                    <?php
                        $listaPessoas = Autor::listar();

                        foreach($listaPessoas as $pessoa) {
                            $id = $pessoa["id"];
                            $nome = $pessoa["nome"];
                            echo "<option name='nomebusca1' value='$id'>$nome</option>";
                        }
                    ?>
                    </select>
                    <br>
                    <input class='botao_input' type="submit" value="buscar">
                </form>
            </div>

            <!-- buscar por genero -->

            <div class='busca'>  
                <form method="POST" action="buscarLivroPorGenero">
                    <h2>Busca por genero</h2>
                    <input class='text_input' type="text" name="generobusca" placeholder="digite o genero" required>
                    <br>
                    <input class='botao_input' type="submit" value="buscar">
                </form>
            </div>

            <footer>
        <div class="container_footer">
            <p>Developer by: Giovane M. Guimarães 3030261</p>
            <p>Developer by: Pedro A. dos Reis Alvarez 3030288</p>
            <p>Aluno de Análise e desenvolvimento de sistema IFSP - São Carlos</p>
        </div>
    </footer>

        </div>

    </main>
</body>
</html>