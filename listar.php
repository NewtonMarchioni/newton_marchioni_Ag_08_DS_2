<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Listagem de Amigos - MYSQLI</title>
    <style>
        
        .tabela-amigos {
            width: 95%;
            max-width: 1200px;
            margin: 80px auto; /* Centraliza a tabela com margem superior para o botão de voltar */
        }
        th, td {
            padding: 12px 15px !important;
            text-align: center;
            vertical-align: middle !important;
        }
        /* Dá um pouco mais de destaque e largura livre para o Nome e E-mail */
        th:nth-child(2), td:nth-child(2),
        th:nth-child(4), td:nth-child(4) {
            text-align: left; 
        }
    </style>
</head>
<body>
    <a href="principal.php" class="w3-display-topleft w3-margin">
        <i class="fa fa-arrow-circle-left w3-large w3-teal w3-button w3-xxlarge"></i>
    </a>    
    
    <?php
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "pwii"; 

        $conexao = new mysqli($servername, $username, $password, $dbname);
        
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }

        echo '
        <div class="tabela-amigos">
            <h1 class="w3-center w3-teal w3-round-large w3-margin-bottom">Listagem de Amigos</h1>
            <table class="w3-table-all w3-card-4">
                <thead>
                    <tr class="w3-teal">
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
        ';

        $sql = "SELECT * FROM amigo";
        $resultado = $conexao->query($sql);

        if ($resultado != null) {
            foreach ($resultado as $linha) {
                echo '<tr>';
                echo '<td>'.$linha['idamigo'].'</td>';
                echo '<td>'.$linha['nome'].'</td>';
                echo '<td>'.$linha['apelido'].'</td>';
                echo '<td>'.$linha['email'].'</td>';
                echo '<td>'.date("d/m/Y", strtotime($linha['data_nascimento'])).'</td>';
                echo '<td>'.$linha['cpf'].'</td>';
                echo '<td><a href="excluir.php?id='.$linha['idamigo'].'&nome='.$linha['nome'].'&apelido='.$linha['apelido'].'&email='.$linha['email'].'&data_nascimento='.$linha['data_nascimento'].'&cpf='.$linha['cpf'].'"><i class="fa fa-user-times w3-large w3-text-teal"></i></a></td>';
                echo '<td><a href="atualizar.php?id='.$linha['idamigo'].'&nome='.$linha['nome'].'&apelido='.$linha['apelido'].'&email='.$linha['email'].'&data_nascimento='.$linha['data_nascimento'].'&cpf='.$linha['cpf'].'"><i class="fa fa-refresh w3-large w3-text-teal"></i></a></td>';
                echo '</tr>';
            }
        }

        echo '
            </table>
        </div>
        ';

        $conexao->close();
    ?>
<?php require_once ('rodape.php'); ?>