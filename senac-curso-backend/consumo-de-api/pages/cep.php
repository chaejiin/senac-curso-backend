<?php
$mensagem = "";
// $cep = $_GET['cepBuscado'];
$cep = filter_input(INPUT_GET, "cepBuscado", FILTER_VALIDATE_INT);

if (!isset($cep) || strlen ($cep)!= 8) { //'!' antes do isset é usado para negar a função
    $mensagem = "CEP inválido. Digite exatamente 8 números.";
} else {
     $url = "viacep.com.br/ws/{$cep}/json/";
};

$context = stream_context_create($options);
$response = file_get_contents($url,false, $context);

?>