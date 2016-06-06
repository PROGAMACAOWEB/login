# Sistema de login

Este exemplo ilustra um login suportado por base de dados e utilizando sessões php.

## Base de dados

O exemplo pressupõe a existência uma base de dados MySQL
chamada **pwtpsi** com uma tabela **users** com os seguintes campos:
* username (varchar 20)
* password (varchar 10)
* nome (varchar 20)
* apelido (varchar 20)

com chave primária no campo **username**

Pode utilizar o ficheiro SQL fornecido **pwtpsi.sql** para importar a base de dados usando o **phpmyadmin** ou outro cliente para MySQL.

Esta base de dados pressupõe a existência de um utilzador MySQL **phpweb** com password **phpppp** que tem acesso à BD **pwtpsi**, nomeadamente para SELECT, INSERT, UPDATE e DELETE. Deve configurar um utilizador com estes privilégios para a BD **pwtpsi**. Alternativamente, pode executar o seguinte código SQL para criar o utilizador.

``` SQL
GRANT USAGE ON *.* TO 'phpweb'@'localhost' IDENTIFIED BY PASSWORD '*70AC1DFAEC03D79D9E4A62C54434E5090460AFCC';

GRANT SELECT, INSERT, UPDATE, DELETE ON `pwtpsi`.* TO 'phpweb'@'localhost';
```

Estas configurações estão refletidas no início do ficheiro **connect.php** que é utilizado para conetar ao MySQL, que deverá ser atualizado caso sejam alterados os nomes à base de dados , utilizador ou password.

## Ficheiros
* connect.php (ligação à BD)
* index.php (pagina de entrada autenticada)
* login.php (página de login)
* logout.php (script de logout)
* pwtpsi.sql (sql para importar a base de dados - opcional)

## Funcionamento

São utilizadas sessões PHP.

Sempre que houver um login válido, o username do utilizador é armazenado na variável de sessão **$_SESSION['log']**. Sempre que for feito um logout, esta variável é destruída.

Ao tentar entrar em **index.php** é verificado se existe login. Caso negativo, redireciona para a página de login - **login.php**. Caso exista login válido, mostra a página.

Ao fazer **logout** o script destrói informação de login e redireciona para **login.php**.

Sempre que entra em **login.php** é verificado se já existe um login.

Caso positivo, redireciona para página de conteúdo **index.php**.

Caso contrário verifica se foram enviados dados pelo formulário e verifica se estes (**username** e **password**) existem na Base de Dados de utilizadores.

Havendo correspondência na BD, redireciona para página de conteúdo (**index.php**). Não correspondendo a nenhum utilizador, recarrega/mostra página de login (**login.php**).
