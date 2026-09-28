<?php
session_start();
$tituloPagina = "Logout";
require_once __DIR__ . '/cabecalho.php';?>
<?php
unset( $_SESSION['logado'] );
header("location:index.php");
?>