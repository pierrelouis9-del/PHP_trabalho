<?php
require_once "funcao-heldesk.php";

$mensagem = "";

// Identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // O OPERADOR ?? É CHAMADO DE OPERADOR DE COALESCÊNCIA NULA. 
    // Utiliza o valor da esquerda se ele existir e não for nulo. Caso contrário, utilize o valor da direita.
    $acao = $_POST["acao"] ?? "";

    if ($acao === "cadastrar") {
        $sucesso = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );
        // CORRIGIDO: $mensagem (sem o 'd') e $sucesso (com um 'c')
        $mensagem = $sucesso ? "Chamado cadastrado com sucesso!" : "Erro ao cadastrar. Verifique os dados.";
    }
    
    if ($acao === "atualizar") {
        // O (int) é uma conversão de tipo (type casting).
        // Como o usuário digita "1" mas o array começa em "0", subtraímos 1 da posição enviada.
        $posicao_usuario = (int) ($_POST["posicao"] ?? 0);
        
        $sucesso = atualizarChamado(
            $posicao_usuario - 1,
            $_POST["status"] ?? ""
        );
        $mensagem = $sucesso ? "Status atualizado com sucesso!" : "Erro ao atualizar status.";
    }

    if ($acao === "excluir") {
        $posicao_usuario = (int) ($_POST["posicao"] ?? 0);
        
        // CORRIGIDO: $sucesso com apenas um 'c'
        $sucesso = excluirChamado($posicao_usuario - 1);

        // CORRIGIDO: $sucesso com apenas um 'c'
        $mensagem = $sucesso ? "Chamado excluído com sucesso!" : "Não foi possível excluir.";
    }
}

// Atualiza a lista após qualquer ação do formulário
$chamados = lerChamados();
$relatorio = gerarRelatorio();

// Evite exibir html enviado pelo usuario
function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <h2>HELP DESK</h2>
            <p>Sistema de gerenciamento de chamados</p>
        </div>

        <nav>
            <a href="../index.php">index</a>
            <a href="#cadastrar">Cadastrar</a>
            <a href="#consultar">Consultar</a>
            <a href="#atualizar">Atualizar</a>
            <a href="#excluir">Excluir</a>
        </nav>
    </header>
    <main class="container">

        <!-- Exibe a mensagem de feedback das ações -->
        <?php if (!empty($mensagem)): ?>
            <p style="font-weight: bold; color: blue;"><?= escapar($mensagem) ?></p>
        <?php endif; ?>

        <div class="cadastrar" id="cadastrar">
            <h2>Cadastrar Chamado</h2>
            <form method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <p>Setor:</p>
                <input type="radio" name="setor" value="Producao" required> <label>Produção</label>
                <input type="radio" name="setor" value="Administrativo"> <label>Administrativo</label>
                <input type="radio" name="setor" value="Logistica"> <label>Logística</label>
                <input type="radio" name="setor" value="Financeiro"> <label>Financeiro</label>
                <input type="radio" name="setor" value="TI"> <label>TI</label>

                <p>Equipamento:</p>
                <input type="radio" name="equipamento" value="Computador" required> <label>Computador</label>
                <input type="radio" name="equipamento" value="Impressora"> <label>Impressora</label>
                <input type="radio" name="equipamento" value="Rede"> <label>Rede</label>
                <input type="radio" name="equipamento" value="Sistema"> <label>Sistema</label>
                <input type="radio" name="equipamento" value="Outro"> <label>Outro</label>

                <p><label for="descricao">Descrição:</label></p>
                <textarea name="descricao" id="descricao" required></textarea>

                <p>Prioridade:</p>
                <input type="radio" name="prioridade" value="Baixa" required> <label>Baixa</label>
                <input type="radio" name="prioridade" value="Media"> <label>Média</label>
                <input type="radio" name="prioridade" value="Alta"> <label>Alta</label>

                <p>
                    <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
                </p>
            </form>
        </div>

        <div class="consultar" id="consultar">
            <h2>Consultar Chamados</h2>

            <!-- CORRIGIDO: Agora usa $chamados em vez de $funcionarios -->
            <?php if (count($chamados) === 0) { ?>
                <p>Nenhum chamado cadastrado.</p>
            <?php } ?>

            <!-- CORRIGIDO: Aplicado a função escapar() para segurança dos dados -->
            <?php foreach ($chamados as $posicao => $chamado) { ?>
                <div class="chamado" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                    <h3>Chamado Número <?= $posicao + 1 ?></h3>
                    <p>Nome: <?= escapar($chamado["nome"] ?? '') ?></p>
                    <p>Setor: <?= escapar($chamado["setor"] ?? '') ?></p>
                    <p>Equipamento: <?= escapar($chamado["equipamento"] ?? '') ?></p>
                    <p>Descrição: <?= escapar($chamado["descricao"] ?? '') ?></p>
                    <p>Prioridade: <?= escapar($chamado["prioridade"] ?? '') ?></p>
                    <p>Status: <?= escapar($chamado["status"] ?? 'Aberto') ?></p>
                </div>
            <?php } ?>
        </div>

        <div class="atualizar" id="atualizar">
            <h2>Atualizar Status</h2>
            <form method="POST">
                <label for="posicao">Número do chamado:</label>
                <input type="number" name="posicao" id="posicao" min="1" required>

                <p>Novo status:</p>
                <input type="radio" name="status" value="Aberto" required> <label>Aberto</label>
                <input type="radio" name="status" value="Em andamento"> <label>Em andamento</label>
                <input type="radio" name="status" value="Resolvido"> <label>Resolvido</label>

                <p>
                    <button type="submit" name="acao" value="atualizar">Atualizar</button>
                </p>
            </form>
        </div>

        <div class="excluir" id="excluir">
            <h2>Excluir Chamado</h2>
            <form method="POST">
                <label for="posicao_excluir">Número do chamado:</label>
                <input type="number" name="posicao" id="posicao_excluir" min="1" required>

                <p>
                    <button type="submit" name="acao" value="excluir">Excluir</button>
                </p>
            </form>
        </div>

    </main>
</body>

</html>
