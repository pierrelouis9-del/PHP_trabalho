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
    
}
?>