<?php
require "conexao.php";
echo "<br>Meu sistema está conectado !";

$sql = "CREATE TABLE IF NOT EXISTS teste (
        id INT AUTO_INCREMENT PRIMARY kEY,
        nome VARCHAR(100),
        idade INT 
    )";

$pdo->exec($sql);
echo "<br> Tabela criado com sucesso!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <h3> Menu portfolio</h3>
            <ul class="menu">
                <a href="https://github.com/pierrelouis9-del/PHP_trabalho">Ir para meu repositorio</a>
                <a href="#inicio"></a>
                <a href="#Sobre">inicio</a>
                <a href="#habilidades">Sobre</a>
                <a href="$projetos">habilidades</a>
                <a href="#contato">Contato</a>

            </ul>
        </nav>

    </header>

    <main class="container">

        <section id="inicio" class="inicio">
            <div class="inicio_conteudo">
                <p class="saudacao">
                    Olá eu sou
                </p>

                <h1>
                    Juvensky Pierre Louis
                </h1>

                <h2>Desenvolvedorem formação</h2>
                
                <p>
                    Aluno em desenvolvimento tecnico de sistema 
                </p>

                <a href="#projetos" class="botao">
                    Ver meus projetos 
                </a>

            </div>

        </section>

        <section id="sobre" class="sobre">
            <h1>Sobre mim </h1>
        </section>

        <!--  <section class="tareffas">
    <div class="links">
            <h3>Link de tarefa</h3>
            <ul>
                <a href="https://github.com/pierrelouis9-del/PHP_trabalho">Ir para meu repositorio</a>
                <a href="Projetos/idade.php">Verificador de idade</a>
                <a href="Projetos/notas.php">Verificador de notas</a>
                <a href="Projetos/receber.php">receber notas</a>
                <a href="Projetos/login-basico.php">Fazer login</a>
                <a href="Projetos/jogos.php">Cadastrar jogos</a>

            </ul>
        </div>      
    </section> -->

    </main>

</body>

</html>