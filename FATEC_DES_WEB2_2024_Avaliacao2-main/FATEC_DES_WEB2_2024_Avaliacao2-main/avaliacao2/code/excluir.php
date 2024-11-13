<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();
?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Vagas</title>
</head>

<body>
    <h1>Excluir vaga:</h1>
    <br>
    <form method="post" action="classes/cadastro.php">

        <label>ID da vaga:</label>
        <input type="text" name="id_vaga">
        <br>
        <br>
        <button type="submit" name="action" value="Excluir">Excluir</button>
        <br>
        <br>
        <a href="home.php">Voltar</a>
    </form>

</body>

</html>