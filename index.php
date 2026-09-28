<?php
// Lê o cookie se ele existir no computador do usuário
$usuarioSalvo = isset($_COOKIE['usuario_salvo']) ? $_COOKIE['usuario_salvo'] : '';
session_start();
$tituloPagina = "Página Principal";
require_once __DIR__ . '/cabecalho.php';?>
<body>
    <div class="w3-container w3-round-xxlarge w3-display-middle w3-card-4 w3-third " style="background-color: #f1f1f1; padding: 20px;">
        <div class="w3-center">
            <br>
            <img src="img/gabi.jpg" alt="Gabi" style="width:40%" class="w3-circle w3-margin-top">
            
            <form class="w3-container " action="loginAction.php" method="post">
                <div class="w3-section">
                    <label style="font-weight: bold;">Usuário</label>
                    <input class="w3-input w3-border w3-marginbottom" type="text" placeholder="Digite o nome" name="txtNome" 
                    value="<?php echo htmlspecialchars($usuarioSalvo); ?>" required>
                    <label style="font-weight: bold;">Senha</label>
                    <input class="w3-input w3-border" type="text" placeholder="Digite a Senha" name="txtSenha" required>                    

                    <p>
                        <input class="w3-check" type="checkbox" name="chkLembrar" value="1" <?php if($usuarioSalvo != '') echo 'checked'; ?>>
                        <label class="w3-text-grey">Lembrar meu usuário</label>
                    </p>

                    <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit">Entrar</button>
                </div>
            </form>
            <br>
        </div>
    </div>
<?php require_once ('rodape.php'); ?>