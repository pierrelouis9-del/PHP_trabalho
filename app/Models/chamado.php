<?php
class chamado
{
    //READ - Ler todos os chamados
    public function lerChamados()
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
    public function salvarChamados($chamados)
    {
        $arquivo =  __DIR__ . "/../../storage/data/chamados.json";

        return file_put_contents(
            $arquivo,
            json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        ) !== false;
    }

    //CREATE - Cadastrar chamados
    public function cadastrarChamados($nome, $setor, $equipamento, $descricao, $prioridade)
    {
        if (trim($nome) === "" || trim($descricao) === "") {
        }

        $chamados = $this-> lerChamados();

        $novoChamado = [
            "nome" => trim($nome),
            "setor" => $setor,
            "equipamento" => $equipamento,
            "descricao" => $descricao,
            "prioridade" => $prioridade,
            "status" => "Aberto"
        ];
        $chamados[] = $novoChamado;

        return $this-> salvarChamados($chamados);
    }

    //UPDATE - Atualizar status do chamado
    public function atualizarChamado($posicao, $novoStatus)
    {
        $chamados = $this-> lerChamados();

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

        return $this-> salvarChamados($chamados);
    }

    //DELETE - Excluir chamados
    public function excluirChamado($posicao)
    {
        $chamados = $this-> lerChamados();

        if (!isset($chamados[$posicao])) {
            return false;
        }
        //DELETAR aquela posição especifica
        unset($chamados[$posicao]);
        //Atualizar lista de chamados
        $chamados = array_values($chamados);
        //salvar os chamados novamente pela função salvarChamados()
        return  $this-> salvarChamados($chamados);
    }

    //Relatório de atendimentos
    public function gerarRelatorio()
    {
        $chamados = $this-> lerChamados();

        $relatorios = [
            "total" => 0,
            "abertos" => 0,
            "andamento" => 0,
            "resolvido" => 0
        ];

        foreach ($chamados as $chamado) {
            if ($chamado["status"] === "Aberto") {
                $relatorios["abertos"]++;
            } elseif ($chamado["status"] === "Em andamento") {
                $relatorios["andamento"]++;
            } elseif ($chamado["status"] === "Resolvido") {
                $relatorios["resolvidos"]++;
            }
        }
        return $relatorios;
    }
    //
}
