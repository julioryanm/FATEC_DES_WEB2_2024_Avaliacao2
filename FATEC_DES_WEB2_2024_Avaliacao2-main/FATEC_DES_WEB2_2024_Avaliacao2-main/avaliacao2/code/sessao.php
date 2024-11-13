<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

$url = "localhost"; 
$dbname = "vagas";
$user = "root";
$pass = "";

try {
    $conexao = new PDO("mysql:host=$url;dbname=$dbname", $user, $pass);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $declara = $conexao->prepare("SELECT * FROM vagas"); 
    $declara->execute();
    $vagas = $declara->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $p) {
    echo "Erro na conexão com o banco de dados: " . $p->getMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vagas de Estágio</title>
</head>
<body>
    <h1>Vagas de Estágio:</h1>

    <?php if (empty($vagas)): ?>
        <p>Falha: Não foram encontradas vagas.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($vagas as $vaga): ?>
                <li>
                    <strong><?php echo htmlspecialchars($vaga['nome_empresa']); ?></strong><br>
                    <em><?php echo htmlspecialchars($vaga['curso']); ?></em><br>
                    <p><?php echo nl2br(htmlspecialchars($vaga['descritivo_vaga'])); ?></p>
                    <p><strong>Contato:</strong> <?php echo htmlspecialchars($vaga['email_contato']); ?></p>
                    <p><strong>WhatsApp:</strong> <?php echo htmlspecialchars($vaga['numero_whatsapp']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<br>
<br>
<a href="home.php">Voltar</a>
</body>
</html>
