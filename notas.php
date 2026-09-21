<?php 
$nome = "";
$idade = "";
$res ="";
$n1 = 0;
$n2 = 0;
$n3 = 0;
$n4 = 0;
$n5 = 0;
 

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $n3 = $_POST["n3"];
    $n4 = $_POST["n4"];
    $n5 = $_POST["n5"];
    
    if (($nome || $idade || $n1 || $n2 || $n3 || $n4|| $n5 )== ""){

        $res = "preenche todos os campos";
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="container">
        <div class="inputs">
            <form method="POST">
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
                <input type="number" id="idade" name="idade" placeholder="digite seu idade">
                <input type="number" id="n1" name="n1" placeholder="digite o nota 1">
                <input type="number" id="n2" name="n2" placeholder="digite o nota 2">
                <input type="number" id="n3" name="n3" placeholder="digite o nota 3">
                <input type="number" id="n4" name="n4" placeholder="digite o nota 4">
                <input type="number" id="n5" name="n5" placeholder="digite o nota 5">
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="resultados">

        <?php if($res == "")  {?>
            <h2><?= $nome ?></h2>

            <?php } ?>
        </div>
    </main>
    
</body>
</html>