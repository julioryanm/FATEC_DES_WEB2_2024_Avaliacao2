<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio</title>
</head>
<body>
    <center>
        <h2>Vagas de Estágio</h2>
    </center>
    
    <br>
    <!--
    Espera-se botões aqui
    -->
    <a href="cadastrar.php">Cadastrar vaga</a>
    <br>
    <br>
    <a href="sessao.php">Visualizar vagas</a>
    <br>
    <br>
    <a href="excluir.php">Excluir vaga</a>
    <br>
    <br>
    <a href="login.php">Logout</a>
</body>
</html>