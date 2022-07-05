# Para rodar o projeto utilize os seguintes comandos:

1. Clone o projeto utilizando o comando: `git clone https://github.com/isaacoliveira1/tecpar-teste/`<br>
2. Entre na pasta do projeto<br>
3. Rode o comando `composer install` para instalar as dependencias<br>
4. Rode o comando `symfony server:start` para iniciar a aplicação<br>
5. Rode o comando `php bin/console doctrine:migrations:migrate` para a inserção da tabela no banco de dados.


OBS: Lembre de visualizar se esta correto o banco de dados no .env<br>

# Comandos do projeto
php bin/console gerar-hash string request <br>
Este comando realiza a geração de hash de acordo com a string passada e a quantidade de requisições informadas<br>


# Rotas do projeto

`/home`<br>
Pagina inicial , onde é possivel informar a string solicitada e quantas requisições fazer.<br>
`/gerarHash`<br>
Essa rota é responsavel por gerar a hash de acordo com as informações passadas na pagina inicial, é somente feito via POST<br>
`/visualizar-resultados`<br>
Esta rota demonstra todas as hash geradas de acordo com a string informada e a subsequente em forma de hash concatenada com a string de 8 caracteres.
