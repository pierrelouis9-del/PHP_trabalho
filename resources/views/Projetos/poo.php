
<?php
// 1. CLASSE ABSTRATA
abstract class Robo
{
    public $modelo;
    public $energia;
    public $potencia;
    public $funcao;

    abstract public function operar();
}

// 2. HERANÇA E POLIMORFISMO
class Explorador extends Robo
{
    public function __construct()
    {
        $this->modelo = "Explorador";
        $this->energia = 100;
        $this->potencia = 50;
        $this->funcao = "Explorar ambientes";
    }

    public function operar()
    {
        return "Explorando o ambiente...";
    }
}

class Engenheiro extends Robo
{
    public function __construct()
    {
        $this->modelo = "Engenheiro";
        $this->energia = 150;
        $this->potencia = 80;
        $this->funcao = "Construir e reparar";
    }

    public function operar()
    {
        return "Construindo e reparando estruturas...";
    }
}

class Defensor extends Robo
{
    public function __construct()
    {
        $this->modelo = "Defensor";
        $this->energia = 200;
        $this->potencia = 100;
        $this->funcao = "Proteger a area";
    }

    public function operar()
    {
        return "Protegendo a area...";
    }
}

// 3. ARMAZENAMENTO TEMPORARIO
session_start();

if (!isset($_SESSION["robos"])) {
    $_SESSION["robos"] = [];
}

$mensagem = "";

// 4. RECEBER OS DADOS DO FORMULARIO
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $modelo = $_POST["modelo"] ?? "";
    $robo = null;

    if ($modelo === "explorador") {
        $robo = new Explorador();
    } elseif ($modelo === "engenheiro") {
        $robo = new Engenheiro();
    } elseif ($modelo === "defensor") {
        $robo = new Defensor();
    }

    if ($robo !== null) {
        $_SESSION["robos"][] = $robo;
        $mensagem = "Robo registrado com sucesso!";
    } else {
        $mensagem = "Selecione um modelo valido!";
    }
}

// 5. PROTEGER OS TEXTOS HTML
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
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro de Robos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        form, .robo {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        select, button {
            padding: 10px;
            margin-top: 10px;
        }

        button {
            cursor: pointer;
        }

        .mensagem {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header>
        <h1>Sistema de Registro de Robos</h1>
        <p>Cadastre e consulte os seus robos.</p>
    </header>

    <main class="container">

        <h2>Cadastrar robo</h2>

        <?php if ($mensagem !== ""): ?>
            <p class="mensagem">
                <?= escapar($mensagem) ?>
            </p>
        <?php endif; ?>

        <form method="post">

            <label for="modelo">Modelo do robo:</label>

            <select name="modelo" id="modelo" required>
                <option value="">Selecione um modelo</option>
                <option value="explorador">Explorador</option>
                <option value="engenheiro">Engenheiro</option>
                <option value="defensor">Defensor</option>
            </select>

            <br>

            <button type="submit">Registrar robo</button>

        </form>

        <h2>Robos registrados</h2>

        <?php if (count($_SESSION["robos"]) === 0): ?>

            <p>Nenhum robo registrado.</p>

        <?php else: ?>

            <?php foreach ($_SESSION["robos"] as $robo): ?>

                <div class="robo">

                    <h3>
                        Modelo: <?= escapar($robo->modelo) ?>
                    </h3>

                    <p>
                        <strong>Energia:</strong>
                        <?= escapar($robo->energia) ?>
                    </p>

                    <p>
                        <strong>Potencia:</strong>
                        <?= escapar($robo->potencia) ?>
                    </p>

                    <p>
                        <strong>Funcao:</strong>
                        <?= escapar($robo->funcao) ?>
                    </p>

                    <p>
                        <strong>Operacao:</strong>
                        <?= escapar($robo->operar()) ?>
                    </p>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </main>

</body>
</html>









<?php 
// POO => Programação Orientado Objetos

//   Exemplo sem POO
//   $nome1 = "Juvensky";
//   $vida1 = 100;
//   $dano1 =10;

//   $nome2 = "Dantes";
//   $vida2 = 100;
//   $dano2 =10;

//   function atacar($nome){
//       echo "$nome realizou uma attaque";
//   }
//   atacar($nome);


// Exemplo com POO
// class Personagem {
//     public $nome;
//     public $vida = 100;
//     public $dano =10;

//     public function atacar(){
//         echo"$this->nome realizou um ataque!";
//     }
// }
// $personagem1 = new Personagem();
// $personagem1->nome = "Juvensky";
// $personagem1-> atacar();

// $personagem2 = new Personagem();
// $personagem2->nome = "Dantes";
// $personagem1-> atacar();



//ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito.

//HERANÇA
//Criar uma classe nova aproveitando características de outra.

//POLIMORFISMO
//Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

//ABSTRAÇÃO
//Mostrar o que é necessário e esconder detalhes complicados de funcionamento.
abstract class Personagem {
    public $nome;
    private $vida = 100;//ENCAPSULAMENTO
    public $dano =10;

    public function __construct($nome, $vida, $dano){
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano= $dano;
    }
    //GETTER
    public function getVida(){
        return $this->vida;
    }
    //SETTER
    public function setVida($vida){
        if ($vida < 0){
            echo "A vida não pode ser menor que 0";
            return;
        }else if ($vida == 0){
            echo "$this->nome morreu!\n";
        }
        $this->vida = $vida;
    }
// todas as classes filhas devera onrigatoriamente ter ou implemetar atacar()
 abstract public function atacar();

}

// $Juvensky = new Personagem("juvensky", 100,10);
// $Juvensky ->setVida(50); 
// $Dantes = new Personagem("Dantes", 50, 5);
// $Chloe = new Personagem("Chloe", 30,5);

// $Juvensky->atacar();

//HERANÇA e POLIMORFISMO
class Guereiro extends Personagem{
    //sobrescrevendo o metodo da classe pai (PERSONAGEM)
    public function atacar() //POLIMORFISMO
   
    {
        echo"$this->nome atacou com uma espada!\n";
    }

    public function defender(){
        echo "$this->nome levantou o escudo!\n";
    }
}
class Mago extends Personagem{
        //sobrescrevendo o metodo da classe pai (PERSONAGEM)
    public function atacar()
    {
        echo"$this->nome lançou uma bola de fogo!\n";
    }
    public function lancarMagia(Personagem $alvo, int $quantidade){
        $novoVida = $alvo->getVida() - $quantidade / 0.5;
        $alvo->setVida($novoVida);
        echo"$this->nome lançou uma bola de fogo! sobre $alvo->nome\n";
    }
}

class Curandeiro extends Personagem{
    //sobrescrevendo o metodo da classe pai (PERSONAGEM)
public function atacar()
{
    echo"$this->nome atacou com uma faca!\n";
}
public function curar(Personagem $alvo, int $quantidade){
    $novaVida = $alvo->getVida() +$quantidade;
    $alvo->setVida($novaVida);
    echo"$this->nome curou $alvo->nome!\n";
}
}
class Arqueiro extends Personagem{
    public function atacar(){
        echo"$this->nome atacou com uma flecha normal!\n";
    }
    public function atacaEspecial(Personagem $alvo, int $quantidade){
        $novaVida = $alvo->getVida() - $quantidade;
        $alvo->setVida($novaVida);
        echo"$this->nome atacou $alvo->nome com uma flecha especial!\n";
    }
}

$guereiro = new Guereiro("Juvensky", 100, 10);
$mago = new Mago("Chloe", 70, 5);
$curandeiro = new Curandeiro("Dantes", 50, 10);
$arqueiro = new Arqueiro("Jake", 80, 15);
$personagens =[$guereiro, $mago, $curandeiro, $arqueiro];
foreach($personagens as $p){
    $p->atacar();
}
$curandeiro->curar($guereiro,50); 
echo"vida de $guereiro->nome depois da cura:" . $guereiro->getVida() . "\n";
$arqueiro->atacaEspecial($mago, 20);
echo"vida $mago->nome depois do ataque:" . $mago->getVida() . "\n";
$mago->lancarMagia($arqueiro, 30);
echo"vida de $arqueiro->nome depois do ataque:" . $arqueiro->getVida() . "\n";
$curandeiro->curar($arqueiro, 10);
echo"vida de $arqueiro->nome atual" . $arqueiro->getvida() . "\n";
// $guereiro = new Guereiro("Juvensky", 100, 10);

// $guereiro->atacar(); // metodo herdado
// $guereiro->defender(); // metodo proprio Guereiro

// $mago = new Mago("Juvensky", 100, 10);

// $mago->atacar(); // metodo herdado
// $mago->lancarMagia(); // metodo proprio do Mago


//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe
 // para acessar 
 // https://juvensky315.devlook.xyz/resources/views/Projetos/poo.php

?>