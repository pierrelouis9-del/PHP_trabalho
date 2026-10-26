
<?php
require_once __DIR__ . "/funcao-helpdesk.php";
// require_once __DIR__ . "/../../../app/Models/chamado.php";
$mensagem = "";

//identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //O OPERADOR ?? É CHAMADO DE OPERADOR DE COALESCÊNCIA NULA.
    //ele significa:
    //Utiliza o valor da esquerda se ele existir e não for nulo.
    //Caso contrário, utiliza o valor da direita.

    $acao = $_POST["acao"] ?? "";

    //if(isset($_POST["acao"])){
    //    $acao = $_POST["acao"];
    //} else {
    //    $acao = "";
    //}

    // [? .... : >...] => if else forma abreviada
    // ....??....  => forma abreviada para verificar se o valor é nulo

    if ($acao === "cadastrar") {
        $sucesso = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );

        $mensagem = $sucesso
            ? "Chamado cadastrado com sucesso!"
            : "Erro ao cadastrar. Verifique os dados.";
    }

    if ($acao === "atualizar") {
        //o (int) é uma conversão do tipo, também chamada type casting.
        //ele tenta transformar o valor em um número inteiro.
        //Como o usuário digita o número do chamado começando em 1,
        //subtraímos 1 para obter a posição correta no array.

        $sucesso = atualizarChamado(
            (int) ($_POST["posicao"] ?? 0) - 1,
            $_POST["status"] ?? ""
        );

        $mensagem = $sucesso
            ? "Status atualizado com sucesso!"
            : "Não foi possível atualizar o chamado.";
    }

    if ($acao === "excluir") {
        $sucesso = excluirChamado(
            (int) ($_POST["posicao"] ?? 0) - 1
        );

        $mensagem = $sucesso
            ? "Chamado excluído com sucesso!"
            : "Não foi possível excluir o chamado.";
    }
}

$chamados = lerChamados();

// evite exibir HTML enviado pelo usuário
function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/resources//CSS//helpdesk-1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk - Gerenciamento de Chamados</title>
</head>

<body>
    <header class="header">
        <div class="logo">
            <h2>HELP DESK</h2>
            <p>Sistema de gerenciamento de chamados</p>
        </div>

        <nav>
            <a href="../index.php">Início</a>
            <a href="#cadastrar">Cadastrar</a>
            <a href="#consultar">Consultar</a>
            <a href="#atualizar">Atualizar</a>
            <a href="#excluir">Excluir</a>
        </nav>
    </header>

    <main class="container">

        <p><?= escapar($mensagem) ?></p>

        <div class="cadastrar" id="cadastrar">

            <h2>Cadastrar Chamado</h2>

            <form action="index.php?rota=helpdesk" method="POST">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <p>Setor:</p>
                <label for="producao">Produção</label>
                <input type="radio" name="setor" id="producao" value="Producao" required>

                <label for="administrativo">Administrativo</label>
                <input type="radio" name="setor" id="administrativo" value="Administrativo">

                <label for="logistica">Logística</label>
                <input type="radio" name="setor" id="logistica" value="Logistica">

               <label for="financeiro">Financeiro</label>
                <input type="radio" name="setor" id="financeiro" value="Financeiro">
 

                <label for="ti">TI</label>
                <input type="radio" name="setor" id="ti" value="TI">

                <p>Equipamento:</p>
                <label for="computador">Computador</label>
                <input type="radio" name="equipamento" id="computador" value="Computador" required>

                <label for="impressora">Impressora</label>
                <input type="radio" name="equipamento" id="impressora" value="Impressora">

                <label for="rede">Rede</label>
                <input type="radio" name="equipamento" id="rede" value="Rede">

                <label for="sistema">Sistema</label>
                <input type="radio" name="equipamento" id="sistema" value="Sistema">

                <label for="outro">Outro</label>

                <input type="radio" name="equipamento" id="outro" value="Outro">

                <p>
                    <label for="descricao">Descrição:</label>
                </p>

                <textarea name="descricao" id="descricao" required></textarea>

                <p>Prioridade:</p>
                <label for="baixa">Baixa</label>
                <input type="radio" name="prioridade" id="baixa" value="Baixa" required>

                <label for="media">Média</label>
                <input type="radio" name="prioridade" id="media" value="Media">

                <label for="alta">Alta</label>
                <input type="radio" name="prioridade" id="alta" value="Alta">


                <p>
                    <button type="submit" name="acao" value="cadastrar">
                        Cadastrar
                    </button>
                </p>

            </form>

        </div>

        <div class="consultar" id="consultar">

            <h2>Consultar Chamados</h2>

            <?php if (count($chamados) === 0) { ?>

                <p>Nenhum chamado cadastrado.</p>

            <?php } ?>

            <?php foreach ($chamados as $posicao => $chamado) { ?>

                <div class="chamado">

                    <h3>Chamado Número <?= $posicao + 1 ?></h3>

                    <p>Nome: <?= escapar($chamado["nome"] ?? "") ?></p>
                    <p>Setor: <?= escapar($chamado["setor"] ?? "") ?></p>
                    <p>Equipamento: <?= escapar($chamado["equipamento"] ?? "") ?></p>
                    <p>Descrição: <?= escapar($chamado["descricao"] ?? "") ?></p>
                    <p>Prioridade: <?= escapar($chamado["prioridade"] ?? "") ?></p>
                    <p>Status: <?= escapar($chamado["status"] ?? "Aberto") ?></p>

                </div>

            <?php } ?>

        </div>

        <div class="atualizar" id="atualizar">

            <h2>Atualizar Status</h2>

            <form action="index.php?rota=helpdesk" method="POST">

                <label for="posicao_atualizar">Número do chamado:</label>
                <input type="number" name="posicao" id="posicao_atualizar" min="1" required>

                <p>Novo status:</p>
                <label for="aberto">Aberto</label>
                <input type="radio" name="status" id="aberto" value="Aberto" required>

                <label for="andamento">Em andamento</label>
                <input type="radio" name="status" id="andamento" value="Em andamento">

                <label for="resolvido">Resolvido</label>
                <input type="radio" name="status" id="resolvido" value="Resolvido">


                <p>
                    <button type="submit" name="acao" value="atualizar">
                        Atualizar
                    </button>
                </p>

            </form>

        </div>

        <div class="excluir" id="excluir">

            <h2>Excluir Chamado</h2>

            <form action="index.php?rota=helpdesk" method="POST">

                <label for="posicao_excluir">Número do chamado:</label>
                <input type="number" name="posicao" id="posicao_excluir" min="1" required>

                <p>
                    <button type="submit" name="acao" value="excluir">
                        Excluir
                    </button>
                </p>

            </form>

        </div>

    </main>

</body>

</html>
