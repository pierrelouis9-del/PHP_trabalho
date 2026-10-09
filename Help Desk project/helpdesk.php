<?php
 require_once "helpdesk-func.php"


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>HELP DESK</title>
</head>

<body>
    <main>
        <section class="cadastrar">


            <form method="POST">
                <label for="nome"> NOme :</label>
                <input type="text" name="nome" id="nome">
                <label for="setor">Setor:</label>
                <input type="text" name="setor" id="setor">
                <label for="equipamento"> Equipamento:</label>
                <input type="text" name="equipamento" id="equipamento">
                <label for="descicao"> Descrição:</label>
                <input type="text" name="descricao" id="descricao">
                <label for="prioridade">Prioridade</label>]
                <input type="text" name="prioridade" id="prioridade">
                <label for="status">Status</label>
                <input type="radio" name="status" id="status">

                <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
            </form>
        </section>
        <section class="consultar">
            
        <form method="POST">
                <label for="nome"> NOme :</label>
                <input type="text" name="nome" id="nome">
                <label for="setor">Setor:</label>
                <input type="text" name="setor" id="setor">
                <label for="equipamento"> Equipamento:</label>
                <input type="text" name="equipamento" id="equipamento">
                <label for="descicao"> Descrição:</label>
                <input type="text" name="descricao" id="descricao">
                <label for="prioridade">Prioridade</label>]
                <input type="text" name="prioridade" id="prioridade">
                <label for="status">Status</label>
                <input type="radio" name="status" id="status">
                <button type="submit" name="acao" value="cosultar">Consultar</button>
            </form>
        </section>
        <section class="atualizar">
            
        <form method="POST">
                <label for="nome"> NOme :</label>
                <input type="text" name="nome" id="nome">
                <label for="setor">Setor:</label>
                <input type="text" name="setor" id="setor">
                <label for="equipamento"> Equipamento:</label>
                <input type="text" name="equipamento" id="equipamento">
                <label for="descicao"> Descrição:</label>
                <input type="text" name="descricao" id="descricao">
                <label for="prioridade">Prioridade</label>]
                <input type="text" name="prioridade" id="prioridade">
                <label for="status">Status</label>
                <input type="radio" name="status" id="status">
                <button type="submit" name="acao" value="atualizar">Atualizar</button>
            </form>
        </section>
        <section class="excluir">
            
        <form method="POST">
                <label for="nome"> NOme :</label>
                <input type="text" name="nome" id="nome">
                <label for="setor">Setor:</label>
                <input type="text" name="setor" id="setor">
                <label for="equipamento"> Equipamento:</label>
                <input type="text" name="equipamento" id="equipamento">
                <label for="descicao"> Descrição:</label>
                <input type="text" name="descricao" id="descricao">
                <label for="prioridade">Prioridade</label>]
                <input type="text" name="prioridade" id="prioridade">
                <label for="status">Status</label>
                <input type="radio" name="status" id="status">
                <button type="submit" name="acao" value="excluir">Excluir</button>
            </form>
        </section>


    </main>

</body>

</html>