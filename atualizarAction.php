<?php
session_start();
$tituloPagina = "Atualizar Amigo";
require_once __DIR__ . '/cabecalho.php';
?>
<body>
    <div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
        <?php
            require_once __DIR__ . '/conexaoBD.php';

            $sql = "UPDATE amigo SET nome = '".$_POST['txtNome']."', apelido = '".$_POST['txtApelido']."',
                    email='".$_POST['txtEmail']."', data_nascimento='".$_POST['txtDataNascimento']."', cpf='".$_POST['txtCPF']."' 
                    WHERE idamigo = ". $_POST['txtID'] .";";

            if ($conexao->query($sql) === TRUE) {
                echo '
                <meta http-equiv="refresh" content="2;url=listar.php">
                <a href="listar.php" style="text-decoration: none;">
                    <h1 class="w3-button w3-teal w3-round-large w3-block">Amigo Atualizado com sucesso!</h1>
                </a>
                <p class="w3-center w3-text-teal">Redirecionando para a lista...</p>
                ';
            } else {
                echo '
                <meta http-equiv="refresh" content="2;url=listar.php">
                <a href="listar.php" style="text-decoration: none;">
                    <h1 class="w3-button w3-red w3-round-large w3-block">ERRO!</h1>
                </a>
                <p class="w3-center w3-text-red">Falha na atualização: ' . $conexao->error . '</p>
                <p class="w3-center w3-text-grey">Redirecionando para a lista...</p>
                ';
            }

            $conexao->close();
        ?>
    </div>
<?php require_once __DIR__ . '/rodape.php'; ?>