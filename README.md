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

# Solução apresentada

Conforme foi solicitado as 3 funcionalidades, sendo elas:
1. A criação de uma rota que encontra um hash, de certo formato, para uma certa string fornecida como
input.
R: A rota `/home` há dois inputs para geração de uma hash, sendo deles:
STRING - Informar com qual string quer gerar a hash.
REQUISIÇÕES - Assim como é informado no command do symfony a quantidade de requisições, coloquei um input para a quantidade de requisições desejadas.
È possivel navegar entre as rotas para visualizar as hash ja geradas anteriormente conforme sera apresentado na ultima funcionalidade solicitada.
<div align="center">
<img src="https://i.imgur.com/ljomW1C.png" height='300' width='600'>
</div>

2. A criação de um comando que consulta a rota criada e armazena os resultados na base de dados.
R: Ao rodar o seguinte comando no terminal do projeto `php bin/console gerar-hash (string) (requisições)` sera demonstrado os resultados no console e salvo as informações no banco de dados mencionadas no .env
<div align="center"><img src="https://i.imgur.com/5AgDLY0.png"></div>

3. Criação de rota que retorne os resultados que foram gravados.
R: À rota '/visualizar-resultados' foi criada com o intuito de visualizar as hash salvas no banco de dados conforme é apresentado na imagem abaixo. Sendo possivel filtrar pela quantidade de tentativas.
<div align="center"><img src="https://i.imgur.com/KJKADDe.png"></div>

OBS: O botão retornar, leva para a pagina inicial

Caso o filtro seja informado a quantidade de tentativas desejadas, sera escondido os demais dados, conforme demonstrado a imagem abaixo.
<div align="center"><img src="https://i.imgur.com/fYIJ9Th.png"></div>

OBS: Para que os dados anteriores apareçam novamente basta clicar no botão "Limpar filtros"

