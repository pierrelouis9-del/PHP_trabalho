<?php
// informar que a resposta sera em JSON
header('Content-Type: application/json; charset-utf-8');

// Descobrir o metodo utilizado na requisição
$metodo = $_SERVER['REQUEST_METHOD'];

//Lista de chamados de exemplo
$chamados = [
    [
        "id" => 1,
        "titulo" => "computador sem internet"
    ],
    [
        "id" => 2,
        "titulo" => "impressora atolada"
    ]
];

//verificar o metodo da requisição, e executar X açãoes
//Se GET
if ($metodo === "GEt") {
    // 
    // Define o codigo de status HTTp dessa requisição.
    http_response_code(200);
    // JSON_PRETTY_PRINT serve para organizar o JSON com espaços e quebras de linha, facilitando a leitura.
    // JSON_UNESCAPED_UNICODE permite exibir caracteres especiais, como ç, ã e é, sem convertê-los em sequências Unicode.
    // Como a API pode retornar o JSON em uma única linha, o JSON_PRETTY_PRINT é opcional.
    echo json_encode($chamados, JSON_UNESCAPED_UNICODE);
    echo json_encode($chamados, JSON_UNESCAPED_UNICODE);

    exit;
}


//Se POST
if ($metodo === 'POST') {
    // le o conteudo enviado no body na requisição
    //php://input permite ler o corp bruto da requisição.
    $conteudo = file_get_contents('php://input');

    // Converte JSON em Array PHP
    $dados = json_decode($conteudo, true);

    // Verifica se os dados são válidos
    if (
        !is_array($dados) || // O JSON não foi convertido em um array
        !isset($dados['titulo']) || // O título não foi informado ou é nulo
        !is_string($dados['titulo']) || // O título não é um texto
        trim($dados['titulo']) === '' // O título está vazio ou contém apenas espaços
    ) {
        http_response_code(400);
        echo json_encode(["erro" => "Título obrigatório"]);
    }

    // Simula a criação de um chamado novo
    $novoChamado = [
        "id" => 3,
        "titulo" => trim($dados['titulo'])
    ];

    http_response_code(201);

    echo json_encode($novoChamado, JSON_UNESCAPED_UNICODE);

    exit;
}

header('Allow: GET , POST');
http_response_code(405);

// COMANDOS NA VPS PARA TESTAR:
// curl -i -X GET https://juvensky315.devlook.xyz/Projetos/api/api-teste.php
// curl -i -X POST https://juvensky315.devlook.xyz/Projetos/api/api-teste.php \ -H "Content-Type: application/json" \ -d '{"titulo":"Impressora com defeito"}'
// curl -i -X POST https://juvensky315.devlook.xyz/Projetos/api/api-teste.php \ -H "Content-Type: application/json" \ -d '{"titulo":""}'
// curl -i -X POST https://juvensky315.devlook.xyz/Projetos/api/api-teste.php \ -H "Content-Type: application/json" \ -d '{"descricao":"Computador não liga"}'
// curl -i -X POST https://juvensky315.devlook.xyz/Projetos/api/api-teste.php \ -H "Content-Type: application/json" \ -d '{"titulo":}'
// curl -i -X DELETE https://juvensky315.devlook.xyz/Projetos/api/api-teste.php
// curl -i -X GET https://juvensky315.devlook.xyz/Projetos/api/arquivo-inexistente.php


//   Parâmetro   Significado
// -i   Mostra os headers e o status da resposta
// -X GET   Define o método GET
// -X POST  Define o método POST
// -X DELETE   Define o método DELETE
// -H   Adiciona um header HTTP
// -d   Envia dados no corpo da requisição
?>
