<?php
session_start();
$tituloPagina = "Confirmar Exclusão de Amigo";
require_once __DIR__ . '/cabecalho.php';
?>
<body>
    <?php
        require_once 'conexaoBD.php';
        $sql = "DELETE FROM amigo WHERE idamigo = '".$_POST['txtID'] ."';";
        if ($conexao->query($sql) === TRUE) {
            echo '
            <meta http-equiv="refresh" content="2;url=listar.php">
            <a href="listar.php">
                <h1 class="w3-button w3-teal">Amigo Excluido com sucesso! </h1>
            </a>
            <p class="w3-center w3-text-teal">Redirecionando para a lista...</p>
            ';
        } else {
            echo '
            <meta http-equiv="refresh" content="2;url=listar.php">
            <a href="listar.php">
                <h1 class="w3-button w3-teal">ERRO! </h1>
            </a>
            <p class="w3-center w3-text-teal">Redirecionando para a lista...</p>
            ';
        }
        $conexao->close();
    ?>
</div>
<?php require_once __DIR__ . '/rodape.php'; ?>