Tecnologias:
Para o desenvolvimento do projeto foi utilizado, CSS, PHP, HTML e banco de dados MySql e o
framework Materialize.
Acesso:
Através do link: http://testesnx-com.umbler.net/
Usuario : umbler
Senha : testehospedagem
Github : https://github.com/isahsantos/crud-snx

Acesso local :
Requisitos:
 Xampp
 Mysql
 Apache
 Query database
Query banco de dados :
CREATE DATABASE ` testesnx ́
CREATE TABLE `carro` (
`id` int(11) NOT NULL,
`modelo` varchar(100) NOT NULL,
`ano` varchar(4) NOT NULL,
`marca` varchar(100) NOT NULL,
`vlr_fip` decimal(10,2) NOT NULL
)
Obs: na pasta Classe, no arquivo database.php alterar as configurações do banco que está
apontado para o banco hospedado na umbler.

Através do chrome para o arquivo index.php.

Estrutura :

Teste Smart NX – Maria Isabela
Classe carro: model da entidade
Classe database : model para exportação das informações do banco de dados.

Head: meta dados utilizados no projeto, como a importação via cdn do materialize.
Header: cabeçalho da página.

Index: arquivo principal, pagina inicial.
Form: Utilização do formulário e suas funções.
