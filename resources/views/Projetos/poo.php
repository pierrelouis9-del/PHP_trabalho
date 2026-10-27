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
class Personagem {
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
        }
        $this->vida = $vida;
    }

    public function atacar(){
    echo"$this->nome realizou um ataque!";
   }
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
    public function lancarMagia(){
        echo"$this->nome lançou uma bola de fogo!\n";
    }
}

$guereiro = new Guereiro("Juvensky", 100, 10);
$mago = new Mago("Chloe", 30, 5);
$personagem = new Personagem("Dantes", 50, 10);

$personagens =[$guereiro, $mago, $personagem ];
foreach($personagens as $p){
    $p->atacar();
}

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