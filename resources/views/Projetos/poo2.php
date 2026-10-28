<?php 
//Sistema de controle de Produção industrial

//1-Classe abstata
abstract class Maquina{
    public $nome;
    Private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
    }

    //Encapsulamento -Getter
    public function getProducao(){
        return $this->producao;
    }

    // Encapsulamento -> alteração controlada
    public function registrarProducao($quantidade){
        if ($quantidade <= 0){
            return false;
        }
        $this->producao += $quantidade;
        return true;
    }

    // Abstração
  abstract public function operar();  
}

//2-Herança
class Esteira extends Maquina{
    public function operar(){
        return "transportando peças...";
    }
}

class Prensa extends Maquina{
    public function operar(){
        return "Prensando peças...";
    }
}

class Robosoldagem extends Maquina{
    public function operar(){
        return "Soldando peças...";
    }
}
// Seção -> Armazenamento Temporario
if (!isset($_SESSION["maquinas"])){

    $_SESSION["maquinas"] = [];
}

$mensagem = "";

// 4 Server formulando via post
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if(
        $nome ==="" ||
        $quantidade === false ||
        $quantidade <0
    ){
        $mensagem = "Preencha os campos corretamente!";
    } else {
        // Criando  objetos, com Base no formularo
        if ($tipo === "esteira"){
            $$maquina = new Esteira($nome);
        } elseif( $tipo === "prensa"){
            $maquina = new Prensa($nome);
        } elseif( $tipo === "robosoldagem"){
            $maquina = new Robosoldagem($nome);
        }

        //executando os metodos do objeto
        $maquina->registrarProducao($quantidade);

        // Guardando o objeto na Sessão 
        $_SESSION["maquinas"][] = $maquina;

        $mensagem = "maquina cadastrada com successo!";
    }
}

?>