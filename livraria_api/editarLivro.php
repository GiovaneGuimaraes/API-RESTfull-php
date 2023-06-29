<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar carro</title>
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
        margin-top: 15%;
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
        }

        a{
            text-decoration: none;
            color: white;
        }

        button:hover{
            background-color: #4D4DFF;
        }


        form{
            margin-top: 1%;
            height: 150px;
            font-size: large;
            
        }
        input{
            margin-top: 1%;
            width: 200px;
            height: 30px;
        }

        .form_editar{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        select{
            margin-top: 1%;
            margin-bottom: 3%;
            width: 200px;
            height: 30px;
        }

</style>

    <?php
        require_once(__DIR__."/model/Autor.php");
        require_once(__DIR__."/model/Livro.php");

        if(isset($_POST["nomelivro"]) and !empty($_POST["nomelivro"]) and
            isset($_POST["genero"]) and !empty($_POST["genero"]) and
            isset($_POST["ano"]) and !empty($_POST["ano"]) and
            isset($_POST["idPessoa"]) and !empty($_POST["idPessoa"]) and
            isset($_POST["id"]) and !empty($_POST["id"]))
         {
            $nomelivro = $_POST["nomelivro"];
            $genero = $_POST["genero"];
            $ano = $_POST["ano"];
            $idPessoa = $_POST["idPessoa"];
            $id = $_POST["id"];

            if(!Livro::existe($id)) {
                echo "<h1>O livro especificado não existe!</h1>";
                exit;
            }

            if(!Autor::existe($idPessoa)) {
                echo "<p>Livro não pode ser editado!</p>";
            } else {
                $resultado = Livro::editar($id, $nomelivro, $genero, $ano, $idPessoa);
                if($resultado) {
                    echo "<script>alert('Livro editado com sucesso!'); </script>";

                } else {
                    echo "<p>Falha na edição</p>";
                }
            }       
        
    }


        if(isset($_GET["id"]) and !empty($_GET["id"])) {

            if(!Livro::existe($_GET["id"])) {
                echo "<h1>O livro especificado não existe!</h1>";
                exit;
            }
            $livro = Livro::getLivro($_GET["id"]);

        } else {
            echo "<h1>Você deve especificar o livro!</h1>";
            exit;
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

    <h1>Editar Livro: </h1>
    <div class='form_editar'>
    <form method="POST">
        <p>Digite o nome do livro</p>
        <input type="text" name="nomelivro" value="<?= $livro["nomelivro"] ?>" required>
        <p>Digite o genero</p>
        <input type="text" name="genero" value="<?= $livro["genero"] ?>" required>
        <p>Digite o ano</p>
        <input type="number" name="ano" value="<?= $livro["ano"] ?>" min="0" required>
        <p>Digite o autor</p>
            <select name="idPessoa" required>
                <option value=""></option>
                <?php
                    $listaPessoas = Autor::listar();

                    foreach($listaPessoas as $pessoa) {
                        $id = $pessoa["id"];
                        $nome = $pessoa["nome"];

                        if($id == $livro["idPessoa"]) {
                            echo "<option value='$id' selected>$nome</option>"; 
                        } else {
                            echo "<option value='$id'>$nome</option>";
                        }                        
                    }
                ?>
            </select> 
            <input type="hidden" name="id" value="<?= $livro["idlivro"] ?>">      
            <br>
            <button>Editar</button>
            <button><a href='livros'>Voltar</a></button>
    </form>
    </div>

    <footer>
        <div class="container_footer">
            <p>Developer by: Giovane M. Guimarães 3030261</p>
            <p>Developer by: Pedro A. dos Reis Alvarez 3030288</p>
            <p>Aluno de Análise e desenvolvimento de sistema IFSP - São Carlos</p>
        </div>
    </footer>
</body>
</html>