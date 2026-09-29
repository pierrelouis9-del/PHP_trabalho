<?php
require "conexao.php";
echo "<br>Meu sistema está conectado !";

$sql = "CREATE TABLE IF NOT EXISTS Jogos (
        id INT AUTO_INCREMENT PRIMARY kEY,
        nome VARCHAR(100) NOT NULL,
        genero VARCHAR(50) NOT NULL,
        nota DECIMAL 
    )";



$pdo->exec($sql);
echo "<br> Tabela criado com sucesso!";



$nome = "";
$genero = "";
$nota = "";
$res = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

    $sql = "INSERT INTO Jogos (
        nome, genero, nota
        ) VALUES ('$nome','$genero',$nota)";
echo "<br> registro criado com sucesso! 1";

    $pdo->exec($sql);
    
echo "<br> registro criado com sucesso! 2";
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="inputs">
            <form method="POST">
                <input type="text" id="nome" name="nome" placeholder="digite o nome do seu jogo">
                <input type="text" id="genero" name="genero" placeholder="digite o genero do seu jogo">
                <input type="number" min=0 max=5 id="nota" step="0.1" name="nota" placeholder="digite o nota do seu jogo">
                <button type="submit">ENVIAR</button>
            </form>

        </div>

    </main>

</body>

</html>