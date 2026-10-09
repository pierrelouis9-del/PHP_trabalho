<?php 
$nome="";
$setor="";
$equipamento="";
$descricao="";
$prioridade="";
$status="";
$acao="";


$caminho = __DIR__ . "./chamados.json";

$json = file_get_contents($caminho);

$funcionarios = json_decode($json, true);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $acao= $_POST["acao"];

    if($acao === "cadastrar"){

        $novoFuncionario=[
            "nome" => $_POST["nome"],
            "setor"=> $_POST["setor"],
            "equipamento" => $_POST["equipamento"],
            "descricao" => $_POST["descricao"],
            "prioridade" => $_POST["prioridade"],
            "status" => $_POST["status"], 
        ];
        
    }
}
?>