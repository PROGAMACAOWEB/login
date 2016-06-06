<?php
//iniciar controlo de sessões
session_start();
// esta alguem logado?
if (!isset($_SESSION['log'])) {
	// não! passa para pagina login
	header('location: login.php');
}

//  havendo um login - continua
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1> ola <?php echo $_SESSION['log']; ?> </h1>
    <a href="logout.php"> logout </a>
  </body>
</html>
