<?php
    require "conexao.php";
    echo "<br>Meu sistema está conectado !";

    $sql = "CREATE TABLE IF NOT EXISTS teste (
        id INT AUTO_INCREMENT PRIMARY kEY,
        nome VARCHAR(100),
        idade INT 
    )";

    $pdo->exec($sql);
    echo "<br> Tabela criado com sucesso!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="links">
            <h3>Link de tarefa</h3>
            <ul>
                <a href="https://github.com/pierrelouis9-del/PHP_trabalho">Ir para meu repositorio</a>
                <a href="idade.php">Verificador de idade</a>
                <a href="notas.php">Verificador de notas</a>
                <a href="receber.php">receber notas</a>
                <a href="login-basico.php">Fazer login</a>
                <a href="jogos.php">Cadastrar jogos</a>

            </ul>
        </div>

    </main>

</body>

</html>