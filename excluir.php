<?php
session_start();
require_once __DIR__ . '/verificarAcesso.php';
$tituloPagina = "Exclusão de Amigo";
require_once __DIR__ . '/cabecalho.php';
?>
<body>
    <a href="listar.php" class="w3-display-topmiddle w3-teal w3-center w3-padding w3-button" style="text-decoration:none; margin-top: 10px;">
        <i class="fa fa-ban" style="font-size:4em"></i>
        <p style="font-weight:bold; margin: 4px 0 0 0;">CANCELAR EXCLUSÃO</p>
    </a>

    <!-- Aspas corrigidas na classe da div principal -->
    <div class="w3-padding w3-content w3-text-grey w3-third w3-display-middle">
        <h1 class="w3-center w3-teal w3-round-large w3-margin-bottom">EXCLUIR - ID: <?php echo " " . htmlspecialchars($_GET['id']); ?></h1>
        
        <form action="excluirAction.php" class="w3-container" method="post">
            <input name="txtID" type="hidden" value="<?php echo htmlspecialchars($_GET['id']); ?>">
            
            <label class="w3-text-teal" style="font-weight: bold;">Nome</label>
            <input name="txtNome" class="w3-input w3-border w3-grey" disabled value="<?php echo htmlspecialchars($_GET['nome']); ?>">
            <br>
            
            <label class="w3-text-teal" style="font-weight: bold;">Apelido</label>
            <input name="txtApelido" class="w3-input w3-border w3-grey" disabled value="<?php echo htmlspecialchars($_GET['apelido']); ?>">
            <br>
            
            <label class="w3-text-teal" style="font-weight: bold;">Email</label>
            <input name="txtEmail" class="w3-input w3-border w3-grey" disabled value="<?php echo htmlspecialchars($_GET['email']); ?>">
            <br>
            
            <label class="w3-text-teal" style="font-weight: bold;">Data de Nascimento</label>
            <input name="txtDataNascimento" class="w3-input w3-border w3-grey" disabled value="<?php echo date("d/m/Y", strtotime($_GET['data_nascimento'])); ?>">
            <br>
            
            <label class="w3-text-teal" style="font-weight: bold;">CPF</label>
            <input name="txtCPF" class="w3-input w3-border w3-grey" disabled value="<?php echo htmlspecialchars($_GET['cpf']); ?>">
            <br>
            
            <!-- Botão com espaçamento superior garantido via estilo e margem -->
            <div class="w3-margin-top" style="padding-top: 12px;">
                <button name="btnExcuir" class="w3-button w3-teal w3-round-large w3-right" style="margin-top: 10px;">
                    <i class="w3-xlarge fa fa-check"></i> Confirmar Exclusão
                </button>
            </div>
        </form>
    </div>
<?php require_once __DIR__ . '/rodape.php'; ?>