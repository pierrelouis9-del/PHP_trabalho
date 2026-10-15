<?php
require_once "funcao-heldesk.php";

$mensagem = "";

//identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //O OPERADOR ?? É CHAMADO DE OPERADOR DECALESCENCIA NULA. 
    //ele signiofica  
    //Utiliza o valor de esquerda se elel existir e não for nulo. caso contratio, utilize o valor direita
    $acao = $_POST["acao"] ?? "";
    //if(isset($_POST["acao"])){
    // $acao = $_POST["acao"];
    //} ele  {
    // $acao = ";
    //}

    if ($acao === "cadastrar") {
        $successo = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );
        $mensdagem = $successo ? "Chamado cadastrado com sucesso!" : "erro ao cadastrar. verifique os dados";
    }
    if ($acao === "atualizar") {
        $sucesso = atualizarChamado(
            (int) ($_POST["posicao"] ?? -1),
            $_POST["status"] ?? ""
        );
    }

    if($acao === "excluir") {
        
    }
}
