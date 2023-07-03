# API de uma livraria em php utilizando o método Restfull

  Trata-se de um sistema em PHP que implementa uma API RESTful para uma aplicação de livraria, esses códigos fornecem uma estrutura básica que permite a manipulação de autores e livros em uma livraria por meio de solicitações HTTP aos endpoints correspondentes.
  'o foco principal não é o embelezamento do site, mas sim, sua aplicação no backend'
  
![1](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/5b27050f-a5f0-46f1-b62a-fe7f70a62c72)

  A primeira imagem trata-se da cara do site, mostrando que é permitido fazer a busca de livros, autores específicos, e também a busca de livros a partir de um ano de publicação. Utilizam os arquivos 'buscarPorAno' , 'buscarPorAutor' e 'buscarPorGenero': 
- Ao enviar o formulário de 'Busca por ano' ele chama o arquivo buscarPorAno.php que é uma página HTML que contém uma tabela com a lista de livros de um determinado ano. Ele começa importando a classe "Livro.php" que contém as funcionalidades relacionadas aos livros. Em seguida, ele verifica se o parâmetro "anobusca" foi enviado por meio de um formulário e se não está vazio. Caso esteja vazio, exibe a mensagem "Inválido" e encerra a execução.
  
![2](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/536bdabe-11d3-4d5d-8753-139f5aa0b3dd)

- Ao enviar o formulário de 'Buscar livro por autor' ele chama o arquivo buscarPorAutor.php que é semelhante ao código anterior, mas busca os livros por autor. Ele importa as classes "Livro.php" e "Autor.php" que contêm as funcionalidades relacionadas a livros e autores, respectivamente. O código verifica os parâmetros "nomebusca" e "idPessoa" enviados por meio de um formulário. A partir da busca do ID do autor, se encontra os livros que ele produziu. O resultado da busca é exibido em uma tabela, semelhante ao código anterior.
  
![3](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/a936dda5-33ab-4040-ac25-51ebad9b8efb)

- Ao enviar o formulário de 'Busca por genero' ele chama o arquivo 'buscarPorGenero.php' que também é semelhante aos códigos anteriores. Ele importa a classe "Livro.php" e realiza a busca de livros por gênero. O parâmetro "generobusca" é verificado para garantir que não esteja vazio, e em seguida, os livros correspondentes ao gênero são listados em uma tabela.
  
![4](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/049b30da-a2ec-45ca-b387-1a3426f6dd31)

No geral, esses códigos permitem que o usuário pesquise livros por ano, autor ou gênero, e exibem os resultados em uma tabela na página HTML.

  Na parte de cadastro de autores: 
 ![5](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/e9f65f27-aea2-434d-87d8-3c352320f174)
 
 trata-se do arquivo 'cadastrarAutor.php' que mostra uma página de cadastro de autor, em que os usuários podem inserir o nome de um autor e enviá-lo para o servidor para ser processado e armazenado em um banco de dados. utiliza o método POST para realizar a inserção no BD '("INSERT INTO autor(nome) VALUES (?)")'

  Na parte de cadastro de livros: 
  ![6](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/bd6e6556-edb6-466e-8ea7-8057eab09143)

  trata-se do arquivo 'cadastrarLivro.php que mostra uma página de cadastro de livro, em que os usuários podem inserir o nome de um livro, genero, ano de publicação e escolher o autor(já cadastrado) do livro. Com isso, no código Livro.php verifica-se se os campos estão vazios ou incorretos, caso não estejam, ele efetua a inserção no banco de dados por meio do método POST '("INSERT INTO livro(nomelivro,genero,ano,idPessoa) VALUES (:nomeLivro, :generoLivro, :anoLivro, :idAutor)")'

 
