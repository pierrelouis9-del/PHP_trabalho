<?php
$nome = "";
$idade = "";
$resultado = "";



//VERIFICANDO SE O METODO USADO E POST 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //re declarar variavel e chama os ids
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];

    if ($idade >= 18) {
        $resultado = "Voce é maior de idade";
    } elseif ($idade <= 0) {
        $resultado = " voce ainda não nasceu";
    } else {
        $resultado = "Voce é menor de idade";
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <main class="container">
        <div class="A">
            <form method="POST">
                <input type="text" placeholder="Escrever seu nome" id="nome" name="nome">
                <br>
                <input type="number" placeholder="Escrever sua idade" id="idade" name="idade">
                <br>
                <button type="submit"> Enviar </button>
            </form>
        </div>
        <div class="B">

            <!--  -->
            <?php if ($resultado != "") { ?>

                <h4>
                    <strong>Nome:</strong><?= $nome ?> <br>
                    <strong>Idade:</strong><?= $idade ?> <br>
                    <?= $resultado ?>
                </h4>
            <?php } ?>
        </div>
        <div class="c">

        </div>

    </main>
</body>

</html>