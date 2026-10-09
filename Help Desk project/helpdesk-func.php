
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

    $caminho = __DIR__ . "./chamados.json";

    $json = file_get_contents($caminho);

    $funcionarios = json_decode($json, true);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];

        if ($acao === "cadastrar") {

            $novoFuncionario = [
                "nome" => $_POST["nome"],
                "setor" => $_POST["setor"],
                "equipamento" => $_POST["equipamento"],
                "descricao" => $_POST["descricao"],
                "prioridade" => $_POST["prioridade"],
                "status" => $_POST["status"],
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
?>