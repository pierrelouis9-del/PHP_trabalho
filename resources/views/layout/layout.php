<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/layout.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--Cabeçalho -->
    <header>
        <nav class="navbar">
            <h2 class="logo">Meu Portfólio</h2>
            <ul class="menu">
                <li>
                    <a href="./index.php">Inicio</a>
                </li>
                <li>
                    <a href="./index.php#projetos">Projetos</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="pagina-projeto">
        <section class="cabecalho-projeto">
            <p class="projeto-tipo">
                Projeto
            </p>
            <h1>Cadastro de Jogos</h1>
            <p>
                Atividade desenvolvido durante as aulas de Desenvolvimento de sistema
            </p>
        </section>

        <!-- Atividade....
            Desenvolva o projeto A parte d'aqui-->
        <section class="conteudo-projeto">
            <h2>cadastro de projeto</h2>
            <form method="POST">

  <label for="senha">Senha</label>

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Digite a senha do seu jogo">

                <label for="nome">Nome </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite o nome do seu jogo">

                <label for="genero"> Genero</label>

                <input
                    type="text"
                    id="genero"
                    name="genero"
                    placeholder="Digite o gênero do seu jogo">

                <label for="nota">Nota</label>

                <input
                    type="number"
                    min="0"
                    max="5"
                    id="nota"
                    step="0.1"
                    name="nota"
                    placeholder="Digite a nota do seu jogo">

                <label for="ano"> Data</label>

                <input
                    type="date"
                    id="ano"
                    name="ano"
                    placeholder="Digite o ano de lançamento do seu jogo">

                <button type="submit">ENVIAR</button>
                <a href="../index.php">Voltar</a>
            </form>
        </section>
        <!--Fim da Atividade -->
        <div class="voltar-projetos">
            <a href="../index.php#projetos"> ← Voltar para projetos</a>
        </div>
    </main>
    <!--Rodapé -->
    <footer>
        <p>Desenvolvido por <a href="pierrelouisjuvensky5@gmail.com">Juvensky</a></p>
    </footer>
</body>

</html>