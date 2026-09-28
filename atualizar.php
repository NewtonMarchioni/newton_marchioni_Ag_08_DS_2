<?php
session_start();
require_once __DIR__ . '/verificarAcesso.php';
$tituloPagina = "Atualizar Dados de Amigo";
require_once __DIR__ . '/cabecalho.php';
?>
<body>
<a href="principal.php" class="w3-display-topleft">
    <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>
</a>
<div class="w3-padding w3-content w3-text-grey w3-third w3-margin w3-display-middle">
    <h1 class="w3-center w3-teal w3-round-large w3-margin">Atualizar - ID: <?php echo " ".$_GET['id']?> </h1>
    <form action="atualizarAction.php" class="w3-container" method='post'>
        <input name="txtID" class="w3-input w3-grey w3-border" type="hidden" value="<?php echo $_GET['id']?>">
        <br>
        <label class="w3-text-teal" style="font-weight: bold;">Nome</label>
        <input type="text" name="txtNome" class="w3-input w3-light-grey w3-border" required value="<?php echo $_GET['nome']?>">
        <br>
        <label class="w3-text-teal" style="font-weight: bold;">Apelido</label>
        <input type="text" name="txtApelido" class="w3-input w3-light-grey w3-border" required value="<?php echo $_GET['apelido']?>">
        <br>
        <label class="w3-text-teal" style="font-weight: bold;">Email</label>
        <input type="email" name="txtEmail" class="w3-input w3-light-grey w3-border" required value="<?php echo $_GET['email']?>">
        <br>
        <label class="w3-text-teal" style="font-weight: bold;">Data de Nascimento</label>
        <input type="date" name="txtDataNascimento" class="w3-input w3-light-grey w3-border"
            title="Formato: 00/00/0000" required value="<?php echo $_GET['data_nascimento']?>">
        <br>
        <label class="w3-text-teal" style="font-weight: bold;">CPF</label>
        <input type="text" name="txtCPF" class="w3-input w3-light-grey w3-border"
            pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Formato: 000.000.000-00" required value="<?php echo $_GET['cpf']?>">
        <br>
        <button name="btnAtualizar" class="w3-button w3-teal w3-cell w3-round-large w3-right">
            <i class="w3-xxlarge fa fa-refresh"></i> Atualizar
    </button>
    </form>
</div>
<?php require_once ('rodape.php'); ?>