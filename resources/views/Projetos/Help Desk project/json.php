<?php

$nome = "";
$idade = 0;
$curso = "";

// 1. DECLARAR O CAMINHO DO ARQUIVO JSON 
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/ LER O ARQUIVO JSON
$json = file_get_contents($caminho);

// 3. TRANSFORMAR JSPN EM ARRAY PHP
$alunos = json_decode($json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST["acao"];

    if ($acao === "cadastrar") {
        // 4. CRIAR UM ALUNO

        $novoAluno = [
            "nome" => $_POST["nome"],
            "idade" => $_POST["idade"],
            "curso" =>  $_POST["curso"]
        ];
        // 5. ADICIONAR O ALUNO NO ARRAY
        $alunos[] = $novoAluno;

        // 6. TRANSFORMAR ARRAY PHP EM JSON
        $jsonAtualizado = json_encode(
            $alunos,
            JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE
        );

        // 7. SALVAR NO ARQUIVO
        file_put_contents($caminho, $jsonAtualizado);
    }

    if ($acao === "atualizar") {
        // PEGAR OS DADADOS DO FORMULÁRIO
        $nome = $_POST["nome"];
        $novaIdade = $_post["idade"];
        $novoCurso = $_POST["curso"];

        foreach ($alunos as $posicao => $aluno) {
            if ($aluno["nome"] == $nome) {
                $alunos[$posicao]["idade"] = $novaIdade;
                $alunos[$posicao]["curso"] = $novoCurso;
            }
        }
        // 6. TRANSFORMAR ARRAY PHP EM JSON
        $jsonAtualizado = json_encode(
            $alunos,
            JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE
        );

        // 7. SALVAR NO ARQUIVO
        file_put_contents($caminho, $jsonAtualizado);
    }

    if ($acao === "deletar") {
        //pegar o nome que queremos deletar
        $nome = $_POST["nome"];
        //pecorrer o que queremos deletar 

        foreach ($alunos as $posicao => $aluno) {
            //vrificar se encontou o aluno
            if ($aluno["nome"] == $nome) {
                unset($alunos($posicao));
            }
        }

        //REORGANIZAR AS POSIÇÕES
        $alunos = array_values($alunos);
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
    <div>
        <h2>CADASTRAR ALUNOS</h2>
        <form action="" method=POST>
            <label for="nome">Nome</label>
            <input type="text" name="nome">
            <label for="">Idade</label>
            <input type="number" name="idade">
            <label for="">Curso</label>
            <input type="text" name="curso">
            <button type="submit" name="acao" value="cadastrar">cadastrar</button>
        </form>
    </div>

    <div>
        <h2>
            ALUNOS CADASTRADOS
        </h2>
        <?php foreach ($alunos as $aluno) { ?>
            <h3> <?= $aluno["nome"] ?></h3>
            <p>Idade: <?= $aluno["idade"] ?></p>
            <p>Curso: <?= $aluno["curso"] ?></p>


        <?php } ?>
    </div>

    <div>
        <h2>ATUALIZAR</h2>
        <form action="" method=POST>
            <label for="nome">Nome</label>
            <input type="text" name="nome">
            <label for="">Idade</label>
            <input type="number" name="idade">
            <label for="">Curso</label>
            <input type="text" name="curso">
            <button type="submit" name="acao" value="atualizar">Atualizar</button>
        </form>
    </div>
    <div>
        <h2>DELETAR</h2>
        <form action="" method=POST>
            <label for="nome">Nome</label>
            <input type="text" name="nome">
            <label for="">Idade</label>
            <input type="number" name="idade">
            <label for="">Curso</label>
            <input type="text" name="curso">
            <button type="submit" name="acao" value="deletar">Deletar</button>
        </form>
    </div>
</body>

</html>