<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado(); 
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Vagas</title>
</head>

<body>
<h1>Cadastrar vaga:</h1>
<br>
    <form method="post" action="classes/cadastro.php">
        <label>Nome da Empresa:</label>  
        <br>  
        <input type="text" name="nome_empresa">
        <br>
        <br>
        <label>Número do Whatsapp:</label> 
        <br>
        <input type="text" name="numero_whatsapp">
        <br>
        <br>
        <label>E-mail contato:</label> 
        <br>
        <input type="text" name="email_contato">
        <br>
        <br>
        <label>Breve descritivo da vaga:</label>
        <br> 
        <input type="text" name="descritivo_vaga">
        <br>
        <br>
        <label>Curso:</label>
        <br>
        <input type="text" name="curso">
        <br>
        <br>
        <button type="submit" name="action" value="Cadastrar">Cadastrar</button>
        <br>
        <br>
        <a href="home.php">Voltar</a>
    </form>

</body>

</html>