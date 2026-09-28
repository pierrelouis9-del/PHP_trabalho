<?php
$nome = "";
$senha = "";
$res = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    if ($nome && $senha != "") {
        $res = "Seu login foi realizado com successo";
    } else {
        $res = "prenche todos os campos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
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
            </form>
        </div>
        <div class="affiche">
            <?php if ($res != "") { ?>
                <h3>Bem-vindo <strong><?= $nome ?> </strong></h3>
                <p><?= $res ?></p>


            <?php } ?>
        </div>
    </main>

</body>

</html>