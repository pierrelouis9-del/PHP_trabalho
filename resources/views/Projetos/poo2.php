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

        $mensagem = "Maquina cadastrada com successo!";
    }
}

// evitar interpretar textos como Html
function escapar($texto){
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "UTF-8");
     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="title">
        <h1>Sistema de controle de Produção industrial</h1>
        </div>
        <div class="subtitle">
            Um prototipo de um sistema que faz o cadastro de maquinas  numa empresa. 
        </div>
    </div>
    <br>
    <main class="container">
        <div>
        <form action="" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <br>
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo">
                <option value="esteira">esteira</option>
                <option value="prensa">prensa</option>
                <option value="robosoldagem">robosoldagem</option>
            </select>
            <br>
            <label for="quantidade">Quantidade</label>
            <input type="number" min=0 name="quantidade" id="quantidade">
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
    <div class="mensagem">
        <?php if ($mensagem != "") {?>
      <strong>  <?= $mensagem ?></strong>
        
    </div>
    <div>
        <h3><?= $nome ?></h3>
        <h3><?= $tipo ?></h3>
        <h3><?= $quantidade?></h3>
    </div>
<?php }?>
    </main>
</body>
</html>