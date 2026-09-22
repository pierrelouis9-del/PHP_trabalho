<?php
$nome = "";
$idade = "";
$res = "";
$media = 0;
$frequencia = 0;
$n1 = 0;
$n2 = 0;
$n3 = 0;
$n4 = 0;
$n5 = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $frequencia = $_POST["frequencia"];
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $n3 = $_POST["n3"];
    $n4 = $_POST["n4"];
    $n5 = $_POST["n5"];

    $media = (($n1 * 2) + ($n2 * 3) + ($n3 * 1) + ($n4 * 1) + ($n5 * 3)) / 10;

    if ($media >= 7 && $frequencia >= 75) {
        $res = "Aprovado!!";
    } elseif ($media >= 5 && $media < 7 && $frequencia >= 75) {
        $res = "Recuperação";
    } elseif ($media < 5 && $frequencia >= 75) {
        $res = "Reprovado por nota";
    } elseif ($media > 7 && $frequencia < 75) {
        $res = "Reprovado por frequência!!!!!!";
    } else {
        $res = "Reprovado!!!!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="notas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <div class="inputs">
            <form method="POST">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" id="nome" name="nome" placeholder="Digite o nome do aluno">
                <label for="idade"><strong>Idade</strong></label>
                <input type="number" min="0" max="99" id="idade" name="idade" placeholder="digite a idade do aluno">
                <label for="frequencia"><strong>Fequência</strong></label>
                <input type="number" min="0" max="100" id="frequencia" name="frequencia" placeholder="digite a porcentagem de frequencia do aluno" />
                <label for="n1"> <strong>Nota1</strong> (peso 2)</label>
                <input type="number" min="0" max="10" id="n1" name="n1" placeholder="digite o nota 1">
                <label for="n2"><strong>Nota2</strong> (peso 3)</label>
                <input type="number" min="0" max="10" id="n2" name="n2" placeholder="digite o nota 2">
                <label for="n3"><strong>Nota3</strong> (peso 1)</label>
                <input type="number" min="0" max="10" id="n3" name="n3" placeholder="digite o nota 3">
                <label for="n4"><strong>Nota4</strong> (peso 1)</label>
                <input type="number" min="0" max="10" id="n4" name="n4" placeholder="digite o nota 4">
                <label for="n5"><strong>Nota5</strong> (peso 3)</label>
                <input type="number" min="0" max="10" id="n5" name="n5" placeholder="digite o nota 5">
                <button type="submit">Enviar</button>
                <a href="index.php">voltar</a>
            </form>
        </div>
        <div class="resultados">

            <?php if ($res != "") { ?>
                <h2>Nome: <?= $nome ?></h2>
                <h2>Idade: <?= $idade ?></h2>
                <div class="freq"><strong>Média: </strong><?= $media ?></div>
                <br>
                <div class="freq"> <strong>Frequência: </strong><?= $frequencia ?> <strong> %</strong></div>
                <h3><?= $res ?></h3>


            <?php } ?>
        </div>
    </main>

</body>

</html>