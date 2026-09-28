
<?php
session_start();
require_once __DIR__ . '/verificarAcesso.php';

// Ajusta o fuso horário para o horário de Brasília
date_default_timezone_set('America/Sao_Paulo');

// 1. Lê a última visita gravada anteriormente
$ultimaVisita = isset($_COOKIE['ultimo_acesso']) ? $_COOKIE['ultimo_acesso'] : null;

// 2. Grava a visita atual para a próxima leitura (expira em 30 dias)
setcookie('ultimo_acesso', date('d/m/Y \à\s H:i'), time() + (30 * 24 * 3600), "/");

$tituloPagina = "Painel Principal";
require_once __DIR__ . '/cabecalho.php';
?>
<body>
    <div class="w3-content w3-padding w3-text-teal">
        <h2>Bem-vindo(a), <?php echo $_SESSION['logado']; ?>!</h2>
        
        <?php if ($ultimaVisita): ?>
            <p class="w3-small w3-text-teal">Seu último acesso foi em: <strong><?php echo $ultimaVisita; ?></strong></p>
        <?php else: ?>
            <p class="w3-small w3-text-teal">Este é o seu primeiro acesso registrado.</p>
        <?php endif; ?>
    </div>
    <div class="w3-padding w3-content w3-text-grey w3-third w3-margin w3-displaytopright">
        <form action="logoutAction.php" class="w3-container" method='post'>
        <button name="btnLogout" class="w3-button w3-teal w3-cell w3-roundlarge w3-right w3-margin-right">
            <i class="w3-xxlarge fa fa-times-rectangle"> </i> Logout
        </button>
        </form>
    </div>
    <div class="w3-padding w3-text-grey w3-half w3-display-middle w3-center">
        <h1 class="w3-center w3-teal w3-round-large w3-margin">Projeto Lista de Amigos</h1>
        <div class="w3-row">
            <div class="w3-col w3-button w3-teal w3-cell w3-round-large" style="width:45%;">
                <a href="cadastro.php" style="text-decoration: none;">
                    <i class=" fa fa-user-plus" style="font-size: 10.5em"></i>
                    <p style="font-size: 2em">Adicionar </p>
                </a>
            </div>
            <div class="w3-col w3-button w3-teal w3-cell w3-round-large w3-right" style="width:45%;">
                <a href="listar.php" style="text-decoration: none;">
                    <i class="fa fa-vcard-o" style="font-size: 10.5em"></i>
                    <p style="font-size: 2em">Listar</p>
                </a>
            </div>
        </div>
    </div>
<?php require_once ('rodape.php'); ?>