<?php
$nome = "";
$senha = "";
$res = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    if ($nome == "usuario" && $senha == "1357") {
        $res = "Seu login foi realizado com successo";
    } elseif ($nome != "usuario" && $senha == "1357") {
        $res = "Usuario ou senha incorretos";
    } elseif ($nome != "usuario" || $senha == "1357") {
        $res = "Usuario ou senha incorretos";
    } else {
        $res = "";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="inputs">
            <form method="POST">
                <input type="text" name="nome" id="nome" placeholder="digite seu nome">
                <input type="password" name="senha" id="senha" placeholder="digite seu senha">
                <button type="submit">Entrar</button>
                <a href="../index.php">voltar</a>
            </form>
        </div>
        <div class="affiche">
            <?php if ($res != "") { ?>
                <p><?= $res ?></p>
            <?php } ?>
        </div>
    </main>

</body>

</html>
<!-- A differença entre oget e o post é que o no GET o nome do usuario vai aparecer no url enquanto no POST o url não vai mudar



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nome = $_GET["nome"];
    $senha = $_GET["senha"];

    if ($nome == "usuario" && $senha == "1357") {
        $res = "Seu login foi realizado com successo";
    } elseif ($nome != "usuario" && $senha == "1357") {
        $res = "Usuario ou senha incorretos";
    } elseif ($nome != "usuario" || $senha == "1357") {
        $res = "Usuario ou senha incorretos";
    } else {
        $res = "";
    }
        <div class="inputs">
            <form method="GET">
                <input type="text" name="nome" id="nome" placeholder="digite seu nome">
                <input type="password" name="senha" id="senha" placeholder="digite seu senha">
                <button type="submit">Entrar</button>
            </form>
?> -->