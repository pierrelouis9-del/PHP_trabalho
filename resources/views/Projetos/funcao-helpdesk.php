<?php

//READ - Ler todos os chamados
function lerChamados()
{
    $arquivo = __DIR__ . "/../../storage/data/chamados.json";
    // verificar se o arquivo existe
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, "[]");
    }
    //ler o arquivo
    $conteudo = file_get_contents($arquivo);

    //converter o json para array php
    $chamados = json_decode($conteudo, true);

    return is_array($chamados) ? $chamados : [];
    //if(is_array($chamados){
    // $chamados   
    //}else {
    // []}
}

//Salvar os chamados no JSON
function salvarChamados($chamados)
{
    $arquivo = __DIR__ . "/../../storage/data/chamados.json";

    return file_put_contents(
        $arquivo,
        json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    ) !== false;
}

//CREATE - Cadastrar chamados
function cadastrarChamados($nome, $setor, $equipamento, $descricao, $prioridade)
{
    if (trim($nome) === "" || trim($descricao) === "") {
    }

    $chamados = lerChamados();

    $novoChamado = [
        "nome" => trim($nome),
        "setor" => $setor,
        "equipamento" => $equipamento,
        "descricao" => $descricao,
        "prioridade" => $prioridade,
        "status" => "Aberto"
    ];
    $chamados[] = $novoChamado;

    return salvarChamados($chamados);
}

//UPDATE - Atualizar status do chamado
function atualizarChamado($posicao, $novoStatus)
{
    $chamados = lerChamados();

    $statusPermitidos = [
        "Aberto",
        "Em andamento",
        "Resolvido"
    ];

    // isset() verifica se uma variável ou posição existe e não contém null.
    // O ! inverte o resultado.
    // Portanto:
    // "Se não existir um chamado naquela posição, encerre a função retornando false."
    if (!isset($chamados[$posicao])) {
        return false;
    }

    // in_array() verifica se um valor existe dentro de um array.
    // Nesse caso:
    // - $novoStatus: valor que queremos procurar.
    // - $statusPermitidos: lista de valores aceitos.
    // - true: exige comparação estrita.
    // O ! significa que a condição será verdadeira quando o valor não estiver na lista.
    if (!in_array($novoStatus, $statusPermitidos, true)) {
        return false;
    }

    $chamados[$posicao]["status"] = $novoStatus;

    return salvarChamados($chamados);
}

//DELETE - Excluir chamados
function excluirChamado($posicao) {
    $chamados = lerChamados();

    if (!isset($chamados[$posicao])) {
        return false;
    }
//DELETAR aquela posição especifica
    unset($chamados[$posicao]);
//Atualizar lista de chamados
    $chamados = array_values($chamados);
//salvar os chamados novamente pela função salvarChamados()
    return salvarChamados($chamados);
}

//Relatório de atendimentos
function gerarRelatorio() {
    $chamados = lerChamados();

    $relatorios = [
        "total" => 0,
        "abertos" => 0,
        "andamento" => 0,
        "resolvido" => 0
    ];

    foreach($chamados as $chamado){
        if($chamado["status"]=== "Aberto"){
            $relatorios["abertos"]++;
        } elseif($chamado["status"]=== "Em andamento"){
            $relatorios["andamento"]++;
        }  elseif($chamado["status"]=== "Resolvido"){
            $relatorios["resolvidos"]++;
        }
    }
    return $relatorios;
}
//
