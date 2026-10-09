
<?php

require_once "helpdesk-func.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"] ?? "";

    if ($acao == "cadastrar") {
        Cadastrar();
        $mensagem = "Chamado cadastrado!";
    }

    if ($acao == "atualizar") {
        Atualisar();
        $mensagem = "Operacao de atualizacao realizada.";
    }

    if ($acao == "excluir") {
        Excluir();
        $mensagem = "Operacao de exclusao realizada.";
    }
}

$funcionarios = Consultar();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./CSS/helpdesk.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HELP DESK</title>
</head>

<body>

    <main>

        <h1>HELP DESK</h1>

        <p><?= $mensagem ?></p>

        <div class="cadastrar">

            <h2>Cadastrar Chamado</h2>

            <form method="POST">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <p>Setor:</p>

                <input type="radio" name="setor" value="Producao" required>
                <label>Producao</label>

                <input type="radio" name="setor" value="Administrativo">
                <label>Administrativo</label>

                <input type="radio" name="setor" value="Logistica">
                <label>Logistica</label>

                <input type="radio" name="setor" value="Financeiro">
                <label>Financeiro</label>

                <input type="radio" name="setor" value="TI">
                <label>TI</label>

                <p>Equipamento:</p>

                <input type="radio" name="equipamento" value="Computador" required>
                <label>Computador</label>

                <input type="radio" name="equipamento" value="Impressora">
                <label>Impressora</label>

                <input type="radio" name="equipamento" value="Rede">
                <label>Rede</label>

                <input type="radio" name="equipamento" value="Sistema">
                <label>Sistema</label>

                <input type="radio" name="equipamento" value="Outro">
                <label>Outro</label>

                <p>
                    <label for="descricao">Descricao:</label>
                </p>

                <textarea name="descricao" id="descricao" required></textarea>

                <p>Prioridade:</p>

                <input type="radio" name="prioridade" value="Baixa" required>
                <label>Baixa</label>

                <input type="radio" name="prioridade" value="Media">
                <label>Media</label>

                <input type="radio" name="prioridade" value="Alta">
                <label>Alta</label>

                <p>
                    <button type="submit" name="acao" value="cadastrar">
                        Cadastrar
                    </button>
                </p>

            </form>

        </div>

        <div class="consultar">

            <h2>Consultar Chamados</h2>

            <?php if (count($funcionarios) == 0) { ?>

                <p>Nenhum chamado cadastrado.</p>

            <?php } ?>

            <?php foreach ($funcionarios as $posicao => $funcionario) { ?>

                <div class="chamado">

                    <h3>Chamado Numero <?= $posicao + 1 ?></h3>

                    <p>Nome: <?= $funcionario["nome"] ?></p>
                    <p>Setor: <?= $funcionario["setor"] ?></p>
                    <p>Equipamento: <?= $funcionario["equipamento"] ?></p>
                    <p>Descricao: <?= $funcionario["descricao"] ?></p>
                    <p>Prioridade: <?= $funcionario["prioridade"] ?></p>
                    <p>Status: <?= $funcionario["status"] ?></p>

                </div>

            <?php } ?>

        </div>

        <div class="atualizar">

            <h2>Atualizar Status</h2>

            <form method="POST">

                <label for="posicao_atualizar">Numero do chamado:</label>
                <input type="number" name="posicao" id="posicao_atualizar" min="1" required>

                <p>Novo status:</p>

                <input type="radio" name="status" value="Aberto" required>
                <label>Aberto</label>

                <input type="radio" name="status" value="Em andamento">
                <label>Em andamento</label>

                <input type="radio" name="status" value="Resolvido">
                <label>Resolvido</label>

                <p>
                    <button type="submit" name="acao" value="atualizar">
                        Atualizar
                    </button>
                </p>

            </form>

        </div>

        <div class="excluir">

            <h2>Excluir Chamado</h2>

            <form method="POST">

                <label for="posicao_excluir">Numero do chamado:</label>
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

