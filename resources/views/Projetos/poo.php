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
    public $vida = 100;
    public $dano =10;

    public function __construct($nome, $vida, $dano){
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano= $dano;
    }
    public function atacar(){
    echo"$this-nome realizou um ataque!";
   }
}

$Juvensky = new Personagem("juvensky", 100,10);
$Dantes = new Personagem("Dantes", 50, 5);
$Chloe = new Personagem("Chloe", 25,5);



?>