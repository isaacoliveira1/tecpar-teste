# Para rodar o projeto utilize os seguintes comandos:

1. Clone o projeto utilizando o comando: `git clone https://github.com/isaacoliveira1/tecpar-teste/`
2. Entre na pasta do projeto
3. Rode o comando `composer install` para instalar as dependencias
4. Rode o comando `symfony server:start` para iniciar a aplicação

OBS: Lembre de visualizar se esta correto o banco de dados no .env

# Comandos do projeto
php bin/console gerar-hash string request 
Este comando realiza a geração de hash de acordo com a string passada e a quantidade de requisições informadas


# Rotas do projeto

/home
Pagina inicial , onde é possivel informar a string solicitada e quantas requisições fazer.
/gerarHash
Essa rota é responsavel por gerar a hash de acordo com as informações passadas na pagina inicial, é somente feito via POST
/visualizar-resultados
Esta rota demonstra todas as hash geradas de acordo com a string informada e a subsequente em forma de hash concatenada com a string de 8 caracteres.
