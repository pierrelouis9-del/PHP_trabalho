<?php
require "conexao.php";

echo '<div class="mensagens">Meu sistema está conectado!</div>';

$sql = "CREATE TABLE IF NOT EXISTS Jogos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        genero VARCHAR(50) NOT NULL,
        nota DECIMAL(3,2),
        ano_lancamento DATE NOT NULL
    )";


// exec() = executa algo quando você não precisa receber dados de volta [só enviar ]
$pdo->exec($sql);

// $alterar = "ALTER TABLE Jogos 
//   ADD COLUMN ano_lancamento DATE NOT NULL";

// $pdo->exec($alterar);          
echo '<div class="mensagens">Tabela criada com sucesso!</div>';

$nome = "";
$genero = "";
$nota = "";
$ano = "";
$senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $ano = $_POST["ano"];
   

    if($senha =="1357"){
        
        $res="acesso desbloqueiado!!";
        $sql = "INSERT INTO Jogos (
            nome, genero, nota, ano_lancamento
            ) VALUES ('$nome', '$genero', $nota, '$ano')";

        echo '<div class="mensagens">Registro criado com sucesso! 1</div>';
        // exec() = executa algo quando você não precisa receber dados de volta [só enviar ]
        $pdo->exec($sql);

        echo '<div class="mensagens">Registro criado com sucesso! 2</div>';

        
    }
}
//buscar os dados do jogos registrados no BANCO DE DADOS
$buscar = "SELECT * FROM Jogos";
// query() = executa uma consulta quando você quer receber dados de volta
$stmt = $pdo->query($buscar);

$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="jogos.css">
    <title>Jogos</title>
</head>

<body>

    <main class="container">

        <div class="inputs">

            <form method="POST">

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Digite a senha do aplicativo">

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite o nome do seu jogo">

                <input
                    type="text"
                    id="genero"
                    name="genero"
                    placeholder="Digite o gênero do seu jogo">

                <input
                    type="number"
                    min="0"
                    max="5"
                    id="nota"
                    step="0.1"
                    name="nota"
                    placeholder="Digite a nota do seu jogo">

                <input
                    type="date"
                    id="ano"
                    name="ano"
                    placeholder="Digite o ano de lançamento do seu jogo">
                <button type="submit">ENVIAR</button>

            </form>

        </div>
        <div class="alerta">
            <?php if ($res != "") { ?>
                <h2><strong><?= $res ?></strong></h2>
            <?php } ?>
        </div>
        <div class="afficche">
            <h2>Jogos registrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Gênero</th>
                        <th>Nota</th>
                        <th>Data_lançamento</th>
                    </tr>
                </thead>
                <!-- foreac() -> para cada item nessa lista vfaça alguma coisa com x variavel -->
                <tbody>
                    <?php foreach ($jogos as $jogo) { ?>
                        <tr>
                            <td><?= $jogo["id"] ?></td>
                            <td><?= $jogo["nome"] ?></td>
                            <td><?= $jogo["genero"] ?></td>
                            <td><?= $jogo["nota"] ?></td>
                            <td><?= $jogo["ano_lancamento"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>