<?php
$userdb = "phpweb";
$passdb = "phpppp";
$hostdb = "localhost";
$namedb = "PWTPSI";


$myconn = new mysqli($hostdb,$userdb,$passdb,$namedb);

if ($myconn->connect_errno) {
    //die ($myconn->connect_error);
    die("Erro na BD");
}
?>
