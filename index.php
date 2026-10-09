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
            <button class="menu-hamburger">
                ☰
            </button>
            <ul class="menu">
                <a href="https://github.com/pierrelouis9-del/PHP_trabalho">Ir para meu repositorio</a>
                <a href="#inicio">Inicio</a>
                <a href="#sobre">Sobre</a>
                <a href="#habilidades">Habilidades</a>
                <a href="#projetos">Projetos</a>

            </ul>
        </nav>

    </header>

    <main class="container">

        <section id="inicio" class="inicio">
            <div class="inicio-conteudo">
                <p class="saudacao">
                    Olá eu sou
                </p>

                <h1>
                    Juvensky
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

        <section id="sobre" class="secao">
            <div class="sobre-conteudo">
                <h1>Sobre mim </h1>
                <div class="foto">
                    yo
                </div>
                <div class="sobre-texto">
                    <h3>Quem sou eu?</h3>
                    <p>
                        Meu nome é Juvensky Pierre Louis e sou
                        estudante em desenvolvimento de sistema.
                    </p>
                    <p>
                        Atualmente estou no fim do meu curso tecnico, onde eu aprendo o
                        desenvolimento web, programação em Javascript,
                        Html e react. Este portfolio reune alguns dos
                        meus projetos desnvolvidos com o meu professor durante o curso.
                    </p>
                    <p>
                        Meu objetivo é trabalhar na area da tecnologia continuando
                        desenvolver minhas habilidades e meus competencias e aprender
                        novas tecnologias.

                    </p>
                </div>
            </div>

        </section>
        <section id="habilidades" class="secao secao-destaque">
            <h2 class="titulo-secao">Minhas Habilidades</h2>
            <p class="subtitulo-secao">Algumas tecnologias que estou estudando:</p>
            <div class="lista-habilidades">
                <div class="habilidades">HTML</div>
                <div class="habilidades">CSS</div>
                <div class="habilidades">PHP</div>
                <div class="habilidades">Javascript</div>
            </div>
        </section>

        <section id="projetos" class="secao">
            <h2 class="subtitulo-secao">Meus Projetos</h2>
            <p class="subtitulo-secao">
                Alguns projetos desenvolvidos durante as aulas.
            </p>
            <div class="projetos-container">
                <div class="projeto-card">
                    <div class="projeto-numero">
                        01
                    </div>
                    <h3>Verificação de idade</h3>
                    <p>
                        Esse sistema é um verificador de idade desenvolvido usando PHP, HTML e CSS.

                        Ele foi criado com o objetivo de identificar se uma pessoa é maior ou menor de idade com base na idade informada. O sistema permite inserir o nome e a idade e, após o envio do formulário, exibe os dados informados e uma mensagem com o resultado da verificação.

                        Este projeto ajudou-me a praticar lógica de programação, estruturas condicionais (`if`, `elseif` e `else`), criação de formulários HTML e processamento de dados usando PHP com o método POST.

                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="Projetos/idade.php" class="link-projeto">Ver projeto →</a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">
                        02
                    </div>
                    <h3>Verificação de notas</h3>
                    <p>
                        Esse sistema é um verificador de notas escolares desenvolvido usando PHP, HTML e CSS.

                        Ele foi criado com o objetivo de calcular a média ponderada de um aluno e verificar sua situação escolar de acordo com as notas obtidas e a frequência. O sistema permite informar o nome, a idade, a frequência e cinco notas com pesos diferentes. Após o envio do formulário, são exibidos os dados do aluno, a média calculada e o resultado, que pode ser aprovação, recuperação ou reprovação.

                        Este projeto ajudou-me a praticar lógica de programação, estruturas condicionais, cálculos matemáticos, formulários HTML e processamento de dados com PHP.

                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="Projetos/notas.php" class="link-projeto">Ver projeto →</a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">
                        03
                    </div>
                    <h3>fazer login</h3>
                    <p>
                        Esse sistema é uma página de login desenvolvida usando PHP, HTML e CSS.

                        Ele foi criado com o objetivo de praticar a validação de usuário e senha por meio de formulários. O sistema verifica as informações enviadas pelo usuário e exibe mensagens de sucesso ou erro.

                        Este projeto ajudou-me a desenvolver conhecimentos em lógica de programação, condições em PHP, formulários HTML e processamento de dados usando o método POST.

                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>
                    <a href="Projetos/login-basico.php" class="link-projeto">Ver projeto →</a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">
                        04
                    </div>
                    <h3>Cadastrar Jogos</h3>
                    <p>
                        Esse sistema é um aplicativo de gerenciamento de jogos desenvolvido usando PHP, HTML, CSS.

                        Ele foi desenvolvido com o objetivo de facilitar o cadastro e a consulta de jogos. O sistema permite registrar o nome, gênero, nota e data de lançamento de cada jogo, além de exibir os jogos cadastrados em uma tabela. O cadastro também possui uma verificação por senha.

                        Este projeto ajudou-me a praticar lógica de programação, criação de formulários, integração com banco de dados, consultas SQL e manipulação de dados usando PHP e PDO.

                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                    </div>

                    <a href="Projetos/jogos.php" class="link-projeto">Ver projeto →</a>
                </div>
                <div class="projeto-card">
                    <div class="projeto-numero">
                        05
                    </div>
                    <h3>Help Desk</h3>
                    <p>
                        Esse sistema é uma sistema de Help Desk desenvolvido usando PHP, HTML e CSS.
                        Ele é desenvolvido com o objetivo de facilitar o gerenciamento de chamados de suporte técnico. O sistema permite cadastrar chamados com nome do solicitante, setor, equipamento, descrição e prioridade, além de consultar os registros, atualizar o status e excluir chamados.

                        Os dados são armazenados em um arquivo JSON, permitindo manter os chamados salvos mesmo após fechar a página. Este projeto ajudou-me a praticar lógica de programação, criação de formulários, desenvolvimento web, manipulação de dados e organização de funções em PHP.
                    </p>
                    <div class="tecnologias">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>PHP</span>
                        <span>JSON</span>
                    </div>

                    <a href="Help Desk project/helpdesk.php" class="link-projeto">Ver projeto →</a>
                </div>
            </div>
        </section>
        <section id="contato" class="secao secao-destaque">
            <h2 class="titulo-secao">Meu contato</h2>
            <p class="subtitulo-secao">
                Pode entrar em contato conmigo com esses dados
            </p>
            <div class="contato-container">
                <div class="contato-item">
                    <h3>GitHub</h3>
                    <p>https://github.com/pierrelouis9-del</p>
                </div>
                <div class="contato-item">
                    <h3>Linkdin</h3>
                    <p>www.linkedin.com/in/pierre-louis-juvensky-6b5492418</p>
                </div>
            </div>
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
    <footer>
        <p>
            © Desenvolvido por <a href="pierrelouisjuvensky5@gmail.com">Juvensky</a>
        </p>

    </footer>
    <script>
        const botao = document.querySelector(".menu-hamburger");
        const menu = document.querySelector(".menu");

        botao.addEventListener("click", function() {
            menu.classList.toggle("ativo");
        });
    </script>

</body>

</html>