# API de uma livraria em php utilizando o método Restfull

  Trata-se de um sistema em PHP que implementa uma API RESTful para uma aplicação de livraria, esses códigos fornecem uma estrutura básica que permite a manipulação de autores e livros em uma livraria por meio de solicitações HTTP aos endpoints correspondentes.
  'o foco principal não é o embelezamento do site, mas sim, sua aplicação no backend'
  
![1](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/5b27050f-a5f0-46f1-b62a-fe7f70a62c72)

  A primeira imagem trata-se da cara do site, mostrando que é permitido fazer a busca de livros, autores específicos, e também a busca de livros a partir de um ano de publicação. Utilizam os arquivos 'buscarPorAno' , 'buscarPorAutor' e 'buscarPorGenero': 
- Ao enviar o formulário de 'Busca por ano' ele chama o arquivo buscarPorAno.php que é uma página HTML que contém uma tabela com a lista de livros de um determinado ano. Ele começa importando a classe "Livro.php" que contém as funcionalidades relacionadas aos livros. Em seguida, ele verifica se o parâmetro "anobusca" foi enviado por meio de um formulário e se não está vazio. Caso esteja vazio, exibe a mensagem "Inválido" e encerra a execução.
  
![2](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/536bdabe-11d3-4d5d-8753-139f5aa0b3dd)

- Ao enviar o formulário de 'Buscar livro por autor' ele chama o arquivo buscarPorAutor.php que é semelhante ao código anterior, mas busca os livros por autor. Ele importa as classes "Livro.php" e "Autor.php" que contêm as funcionalidades relacionadas a livros e autores, respectivamente. O código verifica os parâmetros "nomebusca" e "idPessoa" enviados por meio de um formulário. A partir da busca do ID do autor, se encontra os livros que ele produziu. O resultado da busca é exibido em uma tabela, semelhante ao código anterior.
  
![3](https://github.com/GiovaneGuimaraes/API-php-metodoRestfull/assets/133304083/a936dda5-33ab-4040-ac25-51ebad9b8efb)

