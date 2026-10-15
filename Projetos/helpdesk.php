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

// [? .... : >...] => if else forma abrégiada

// ....??....  => else forma abregiada

    if ($acao === "cadastrar") {
        $successo = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );
        $mensdagem = $sucesso ? "Chamado cadastrado com sucesso!" : "erro ao cadastrar. verifique os dados";
    }
    if ($acao === "atualizar") {
        //o (int) é uma conversão do tipo,também chamada type casting.
        // ele tenta transformar e valor em um numerfo inteiro.
        $sucesso = atualizarChamado(
            (int) ($_POST["posicao"] ?? -1),
            $_POST["status"] ?? ""
        );
    }

    if($acao === "excluir") {
        $sucesso =  excluirChamado((int) ($_POST["posicao"] ?? -1));

        $mensagem = $successo ? "chamado excluido!" : "Não foi possiveç excluir.";
    }
}
$chamados = lerChamados();
$relatorio = gerarRelatorio();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>