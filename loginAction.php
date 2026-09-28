<?php
session_start();
$tituloPagina = "Login";

if (isset($_POST['txtNome']) && isset($_POST['txtSenha'])) {
    $nome = $_POST['txtNome'];
    $senha = $_POST['txtSenha'];
    $lembrar = isset($_POST['chkLembrar']); // Checa se marcou a caixa

    require_once __DIR__ . '/conexaoBD.php';

    $sql = "SELECT * FROM usuario WHERE nome = '".$nome."';";
    $resultado = $conexao->query($sql);
    $linha = $resultado ? $resultado->fetch_assoc() : null;

    if ($linha != null && $linha['senha'] == $senha) {
        $_SESSION['logado'] = $nome;

        if ($lembrar) {
            // Cria o cookie para durar 30 dias: time() + (30 dias * 24 horas * 3600 segundos)
            // O 4º parâmetro "/" garante que o cookie seja acessível em todas as pastas do projeto
            setcookie('usuario_salvo', $nome, time() + (30 * 24 * 3600), "/");
        } else {
            // Se o usuário desmarcou a caixa, apagamos o cookie definindo um tempo no passado
            setcookie('usuario_salvo', '', time() - 3600, "/");
        }
    }
}

require_once __DIR__ . '/cabecalho.php';
?>
<body class="w3-white">
    <div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
        <?php
        if (isset($_POST['txtNome']) && isset($_POST['txtSenha'])) {
            $nome = $_POST['txtNome'];
            $senha = $_POST['txtSenha'];

            require_once __DIR__ . '/conexaoBD.php';

            $sql = "SELECT * FROM usuario WHERE nome = '".$nome."';";
            $resultado = $conexao->query($sql);

            $linha = $resultado ? $resultado->fetch_assoc() : null;

            if ($linha != null) {
                if ($linha['senha'] == $senha) {
                    $_SESSION['logado'] = $nome;

                    // Mensagem de boas-vindas com redirecionamento em 2 segundos para principal.php
                    echo '
                    <meta http-equiv="refresh" content="2;url=principal.php">
                    <a href="principal.php" style="text-decoration: none;">
                        <h1 class="w3-button w3-teal w3-round-large w3-block">'.$nome.', seja bem-vindo(a)!</h1>
                    </a>
                    <p class="w3-center w3-text-teal">Redirecionando para o sistema...</p>
                    ';
                } else {
                    // Senha incorreta: redirecionamento em 2 segundos para index.php
                    echo '
                    <meta http-equiv="refresh" content="2;url=index.php">
                    <a href="index.php" style="text-decoration: none;">
                        <h1 class="w3-button w3-red w3-round-large w3-block">Login inválido!</h1>
                    </a>
                    <p class="w3-center w3-text-teal">Redirecionando em instantes...</p>
                    ';
                }
            } else {
                // Usuário não encontrado: redirecionamento em 2 segundos para index.php
                echo '
                <meta http-equiv="refresh" content="2;url=index.php">
                <a href="index.php" style="text-decoration: none;">
                    <h1 class="w3-button w3-red w3-round-large w3-block">Login inválido!</h1>
                </a>
                <p class="w3-center w3-text-teal">Redirecionando em instantes...</p>
                ';
            }

            $conexao->close();
        } else {
            // Acesso direto sem POST: redirecionamento em 2 segundos para index.php
            echo '
            <meta http-equiv="refresh" content="2;url=index.php">
            <a href="index.php" style="text-decoration: none;">
                <h1 class="w3-button w3-yellow w3-round-large w3-block">Acesso direto não permitido.</h1>
            </a>
            <p class="w3-center w3-text-teal">Retornando à tela de login...</p>
            ';
        }
        ?>
    </div>
<?php require_once __DIR__ . '/rodape.php'; ?>