<?php

// iniciar as sessoes
session_start();

// verificar se alguem logado
// redirecionar para index.php, caso positivo

if (isset($_SESSION['log'])) {
  header('location:index.php');
}

// ninguem está logado

// de onde chegou?
// veio ter a este script a partir do formulário

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// vim de um formulario
	$username = trim($_POST['user']);
	$password = trim($_POST['pass']);

  // verificar se correspondem na bd

  // liga-se à BD
  include_once 'connect.php';

 // prepared statements
  $SQLp = "SELECT * FROM users WHERE username = ? AND password = ? ";

  // prepara a interrogação
  $prepared = $myconn->prepare($SQLp);
  // associa os parâmetros às variáveis
  $prepared->bind_param("ss",$username,$password);
  // executa a interrogação SQL
  $prepared->execute();

  // obtem o resultado
  $result = $prepared->get_result();

  // se houver um "match" username / password na BD
  // então há um login válido
  if ($result->num_rows == 1) {
    //login válido
    $_SESSION['log'] = $username;
    header('location:index.php');
  } else {
    // login não válido (username e password não correspondem)
    header('location:login.php');
  }

}

// se continuar até aqui é porque
// não vim de um formulário
// então mostra formulário de login (esta página)

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form action="login.php" method="post">
      <label for="iuser">username</label>
      <input type="text" name="user" id="iuser" placeholder="o seu username">
      <hr>
      <label for="ipass">password</label>
      <input type="password" name="pass" id="ipass" placeholder="a sua password">
      <hr>
      <input type="submit" value="aceder">
      <input type="reset" value="cancelar">
    </form>
  </body>
</html>
