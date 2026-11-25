<?php
//Sistema de controle de Produção industrial

//1-Classe abstata
abstract class Maquina
{
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    //Encapsulamento -Getter
    public function getProducao()
    {
        return $this->producao;
    }

    // Encapsulamento -> alteração controlada
    public function registrarProducao($quantidade)
    {
        if ($quantidade <= 0) {
            return false;
        }
        $this->producao += $quantidade;
        return true;
    }

    // Abstração
    abstract public function operar();
}

//2-Herança
class Esteira extends Maquina
{
    public function operar()
    {
        return "transportando peças...";
    }
}

class Prensa extends Maquina
{
    public function operar()
    {
        return "Prensando peças...";
    }
}

class Robosoldagem extends Maquina
{
    public function operar()
    {
        return "Soldando peças...";
    }
}
// Seção -> Armazenamento Temporario
if (!isset($_SESSION["maquinas"])) {

    $_SESSION["maquinas"] = [];
}

$mensagem = "ola";

// 4 Server formulando via post
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if (
        $nome === "" ||
        $quantidade === false ||
        $quantidade < 0
    ) {
        $mensagem = "Preencha os campos corretamente!";
    } else {
        // Criando  objetos, com Base no formularo
        if ($tipo === "esteira") {
            $$maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "robosoldagem") {
            $maquina = new Robosoldagem($nome);
        }

        //executando os metodos do objeto
        $maquina->registrarProducao($quantidade);

        // Guardando o objeto na Sessão 
        $_SESSION["maquinas"][] = $maquina;

        $mensagem = "Maquina cadastrada com successo!";
    }
    
}

// evitar interpretar textos como Html
function escapar($texto)
{
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/poo2.css'])
</head>

<body>
    <header>
        <h1>PROGRAMAÇÂO ORIENTADO OBJETO</h1>
    </header>
    <div class="header">
        <div class="title">
            <h1>Sistema de controle de Produção industrial</h1>
        </div>
        <div class="subtitle">
            Um prototipo de um sistema que faz o cadastro de maquinas numa empresa.
        </div>
    </div>
    <br>
    <main class="container">
        <div class="mensagem">
            <?php if ($mensagem != "") { ?>
                <strong> <?= $mensagem ?></strong>

        </div>
        <div>
            <form action="/poo2" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome">
                <br>
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo"> 22
                    <option value="esteira">Esteira</option>
                    <option value="prensa">Prensa</option>
                    <option value="robosoldagem">Robosoldagem</option>
                </select>
                <br>
                <label for="quantidade">Quantidade</label>
                <input type="number" min=0 name="quantidade" id="quantidade">
                <br>
                <button type="submit">Enviar</button>
            </form>
        </div>

        <div>
            {{-- <p><strong>Nome Maquina: </strong><?=// $nome ?></p>
            <p><strong>Tipo De Maquina: </strong><?= //$tipo ?></p>
            <p><strong>Quantidade de Maquinas: </strong><?= //$quantidade ?></p> --}}
            <div>
                <p><strong>Nome Máquina:</strong> {{ $nome ?? 'Não informado' }}</p>
            
                <p><strong>Tipo de Máquina:</strong> {{ $tipo ?? 'Não informado' }}</p>
            
                <p><strong>Quantidade de Máquinas:</strong> {{ $quantidade ?? 'Não informado' }}</p>
            </div>
        </div>
    <?php } ?>
    </main>
</body>

</html>


<!-- <?php

// // 1. CLASSE ABSTRATA
// abstract class Personagem
//{
//    public $nome;
//    public $classe;
//    public $vida;
//    public $ataque;
//    public $funcao;
//
//    abstract public function atacar();
//}
//
//  // 2. HERANÇA E POLIMORFISMO
//
//class Guerreiro extends Personagem
//{
//    public function __construct()
//    {
//        $this->classe = "Guerreiro";
//        $this->vida = 200;
//        $this->ataque = 80;
//        $this->funcao = "Combate corpo a corpo";
//    }
//
//    public function atacar()
//    {
//        return "Atacando com uma espada!";
//    }
//}
//
//class Mago extends Personagem
//{
//    public function __construct()
//    {
//        $this->classe = "Mago";
//        $this->vida = 120;
//        $this->ataque = 100;
//        $this->funcao = "Ataques mágicos";
//    }
//
//    public function atacar()
//    {
//        return "Lançando uma bola de fogo!";
//    }
//}
//
//class Arqueiro extends Personagem
//{
//    public function __construct()
//    {
//        $this->classe = "Arqueiro";
//        $this->vida = 150;
//        $this->ataque = 70;
//        $this->funcao = "Ataques à distância";
//    }
//
//    public function atacar()
//    {
//        return "Disparando uma flecha!";
//    }
//}
//
// // 3. ARMAZENAMENTO TEMPORARIO
//
//session_start();
//
//if (!isset($_SESSION["personagens"])) {
//    $_SESSION["personagens"] = [];
//}
//
//$mensagem = "";
//
// // 4. RECEBER DADOS DO FORMULARIO
//
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//
//    $nome = $_POST["nome"] ?? "";
//    $classe = $_POST["classe"] ?? "";
//
//    $personagem = null;
//
//    if ($classe === "guerreiro") {
//        $personagem = new Guerreiro();
//
//    } elseif ($classe === "mago") {
//        $personagem = new Mago();
//
//    } elseif ($classe === "arqueiro") {
//        $personagem = new Arqueiro();
//    }
//
//    if ($personagem !== null && trim($nome) !== "") {
//
//        $personagem->nome = trim($nome);
//
//        $_SESSION["personagens"][] = $personagem;
//
//        $mensagem = "Personagem cadastrado com sucesso!";
//
//    } else {
//
//        $mensagem = "Preencha os campos corretamente!";
//    }
//}
//
// // 5. PROTEGER OS TEXTOS HTML
//
//function escapar($texto)
//{
//    return htmlspecialchars(
//        (string) $texto,
//        ENT_QUOTES,
//        "UTF-8"
//    );
//}
//
//?>
//
//<!DOCTYPE html>
//<html lang="pt-BR">
//
//<head>
//
//    <meta charset="UTF-8">
//
//    <meta name="viewport" content="width=device-width, initial-scale=1.0">
//
//    <title>Sistema de Personagens</title>
//
//    <link rel="stylesheet" href="style.css">
//
//</head>
//
//<body>
//
//    <header>
//
//        <h1>Universo RPG</h1>
//
//        <p>Cadastre e gerencie seus personagens.</p>
//
//    </header>
//
//    <main class="container">
//
//        <h2>Cadastrar personagem</h2>
//
//        <?php if ($mensagem !== ""): ?>
//
//            <p class="mensagem">
//                <?= escapar($mensagem) ?>
//            </p>
//
//        <?php endif; ?>
//
//        <form method="post">
//
//            <label for="nome">Nome do personagem:</label>
//
//            <input
//                type="text"
//                name="nome"
//                id="nome"
//                placeholder="Digite o nome"
//                required
//            >
//
//            <label for="classe">Classe do personagem:</label>
//
//            <select name="classe" id="classe" required>
//
//                <option value="">Selecione uma classe</option>
//
//                <option value="guerreiro">Guerreiro</option>
//
//                <option value="mago">Mago</option>
//
//                <option value="arqueiro">Arqueiro</option>
//
//            </select>
//
//            <button type="submit">
//                Cadastrar personagem
//            </button>
//
//        </form>
//
//        <h2>Personagens cadastrados</h2>
//
//        <?php if (count($_SESSION["personagens"]) === 0): ?>
//
//            <p>Nenhum personagem cadastrado.</p>
//
//        <?php else: ?>
//
//            <?php foreach ($_SESSION["personagens"] as $personagem): ?>
//
//                <div class="personagem">
//
//                    <h3>
//                        <?= escapar($personagem->nome) ?>
//                    </h3>
//
//                    <p>
//                        <strong>Classe:</strong>
//                        <?= escapar($personagem->classe) ?>
//                    </p>
//
//                    <p>
//                        <strong>Vida:</strong>
//                        <?= escapar($personagem->vida) ?>
//                    </p>
//
//                    <p>
//                        <strong>Ataque:</strong>
//                        <?= escapar($personagem->ataque) ?>
//                    </p>
//
//                    <p>
//                        <strong>Função:</strong>
//                        <?= escapar($personagem->funcao) ?>
//                    </p>
//
//                    <p>
//                        <strong>Ação:</strong>
//                        <?= escapar($personagem->atacar()) ?>
//                    </p>
//
//                </div>
//
//            <?php endforeach; ?>
//
//        <?php endif; ?>
//
    </main>

</body>
</html> -->
