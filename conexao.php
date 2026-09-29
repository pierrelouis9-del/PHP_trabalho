<?php 

// dados requisitos para a conexão mysql.
$host="localhost";
$banco="juvensky315";
$usuario="juvensky315";
$senha="315!@#";

// PDO = PHP Data Objects ; é uma ferramenta do PHP para conversar com banco de dados
try{// semelhante a um if else se o try não ta coseguindo ele vai para o catch
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);// dbname = database name

    // => SERVE PARA PUSHAR algo que pertende aquele objeto
    // PDO::ATTR_ERRMODE é para  cponfigurar o modo de erros do PDO
    // PDO::ERRMODE_EXEPTION é para quando acontecr algum erro; transformar em execução
    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION  //isso significa que estamos accessando um atributo do PDO
    );
    echo "conectado com sucesso!!";
}catch (PDOException $erro) {
    echo "erro ao conectar:".$erro->getMessage();

}