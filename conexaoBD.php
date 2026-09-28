<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pwii";

$conexao = new mysqli($servername, $username, $password, $dbname);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Garante acentuação e caracteres corretos
$conexao->set_charset("utf8");
?>