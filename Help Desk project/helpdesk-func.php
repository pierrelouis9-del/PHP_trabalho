<?php

$nome = "";
$setor = "";
$equipamento = "";
$descricao = "";
$prioridade = "";
$status = "";
$acao = "";


function Cadastrar()
{
    $caminho = __DIR__ . "/chamados.json";

    $json = file_get_contents($caminho);
    $funcionarios = json_decode($json, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];

        if ($acao === "cadastrar") {

            $nome = $_POST["nome"];
            $setor = $_POST["setor"];
            $equipamento = $_POST["equipamento"];
            $descricao = $_POST["descricao"];
            $prioridade = $_POST["prioridade"];

            if ($nome == "" || $descricao == "") {
                return;
            }

            $novoFuncionario = [
                "nome" => $nome,
                "setor" => $setor,
                "equipamento" => $equipamento,
                "descricao" => $descricao,
                "prioridade" => $prioridade,
                "status" => "Aberto"
            ];

            $funcionarios[] = $novoFuncionario;

            $jsonAtualizado = json_encode(
                $funcionarios,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE
            );

            file_put_contents($caminho, $jsonAtualizado);
        }
    }
}


function Consultar()
{
    $caminho = __DIR__ . "/chamados.json";

    $json = file_get_contents($caminho);
    $funcionarios = json_decode($json, true);

    return $funcionarios;
}


function Atualisar()
{
    $caminho = __DIR__ . "/chamados.json";

    $json = file_get_contents($caminho);
    $funcionarios = json_decode($json, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];

        if ($acao === "atualizar") {

            $posicao = $_POST["posicao"];
            $status = $_POST["status"];

            if (isset($funcionarios[$posicao])) {

                if (
                    $status == "Aberto" ||
                    $status == "Em andamento" ||
                    $status == "Resolvido"
                ) {
                    $funcionarios[$posicao]["status"] = $status;

                    $jsonAtualizado = json_encode(
                        $funcionarios,
                        JSON_PRETTY_PRINT |
                        JSON_UNESCAPED_UNICODE
                    );

                    file_put_contents($caminho, $jsonAtualizado);
                }
            }
        }
    }
}


function Excluir()
{
    $caminho = __DIR__ . "/chamados.json";

    $json = file_get_contents($caminho);
    $funcionarios = json_decode($json, true);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];

        if ($acao === "excluir") {

            $posicao = $_POST["posicao"];

            if (isset($funcionarios[$posicao])) {

                unset($funcionarios[$posicao]);

                $funcionarios = array_values($funcionarios);

                $jsonAtualizado = json_encode(
                    $funcionarios,
                    JSON_PRETTY_PRINT |
                    JSON_UNESCAPED_UNICODE
                );

                file_put_contents($caminho, $jsonAtualizado);
            }
        }
    }
}




?>

