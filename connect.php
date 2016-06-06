<?php
// info de autenticação no SGBD
$userdb = "phpweb";
$passdb = "phpppp";
$hostdb = "localhost";
$namedb = "pwtpsi";

// estabelecer ligação ao SGBD
$myconn = new mysqli($hostdb,$userdb,$passdb,$namedb);

// verifica se existe erro de ligação
if ($myconn->connect_errno) {
    // se existir, sai com mensagem de erro
    //die ($myconn->connect_error);
    die("Erro na BD"); // 'die' -> o mesmo que exit
}
?>
