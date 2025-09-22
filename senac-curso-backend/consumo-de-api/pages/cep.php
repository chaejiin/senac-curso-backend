<?php
$mensagem = "";
// $cep = $_GET['cepBuscado'];
$cep = filter_input(INPUT_GET, "cepBuscado", FILTER_VALIDATE_INT);

if (!isset($cep) || strlen($cep) != 8) { //'!' antes do isset é usado para negar a função
    $mensagem = "CEP inválido. Digite exatamente 8 números.";
} else {
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $configuracoes = [
        "http" => [
            "method" => "GET", //esse GET é diferente do GET do form do html e do php, esse GET serve para pegar a informação de uma API
            "header" => "Content-Type: application/json"
        ]
    ];

    $context = stream_context_create($configuracoes);
    $response = file_get_contents($url, false, $context);
}

if ($response == false) {
    $mensagem = "Erro ao acessar a API ViaCEP.";
} else {
    $dados = json_decode($response, true);
    if (isset($dados['erro'])) {
        $mensagem = "CEP não encontrado.";
    } else {

        echo "<h2> Endereço encontrado </h2>";
        echo "<input type='text' value='{$dados['logradouro']}'> <br>";
        echo "<input type='text' value='{$dados['complemento']}'> <br>";
        echo "<input type='text' value='{$dados['bairro']}'> <br>";
        echo "<input type='text' value='{$dados['localidade']}'> <br>";
        echo "<input type='text' value='{$dados['estado']}'> <br>";
    }

    echo "<p>{$mensagem}</p>";
}
