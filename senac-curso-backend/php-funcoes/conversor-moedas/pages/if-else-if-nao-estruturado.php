<?php

define('TAXA_DOLAR', 5.25);
define('TAXA_EURO', 5.60);
define('TAXA_IENE', 0.035); 

$htmlResultado = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $valorRealInput = $_POST['valor'] ?? null;
    $moedaDestino = $_POST['moeda'] ?? null;
    $erro = ''; 
  
    if (empty($valorRealInput)) {
        $erro = "Erro: O campo de valor não pode estar vazio.";
    } else {
        // Substitui vírgula por ponto para validação numérica
        $valorNumerico = str_replace(',', '.', $valorRealInput);

        if (!is_numeric($valorNumerico)) {
            $erro = "Erro: O valor informado ('{$valorRealInput}') não é um número válido.";
        } else if ($valorNumerico <= 0) {
            $erro = "Erro: O valor para conversão deve ser maior que zero.";
        } else if (empty($moedaDestino)) {
            $erro = "Erro: Por favor, escolha uma moeda para a conversão.";
        } else if (!in_array($moedaDestino, ['USD', 'EUR', 'JPY'])) {
            $erro = "Erro: Moeda selecionada é inválida.";
        }
    }
    
    if (!empty($erro)) {
      
        $htmlResultado = "<div class=\"mensagem-erro\">{$erro}</div>";
    } else {
        
        $valorFloat = (float) str_replace(',', '.', $valorRealInput);
    
        $cotacao = 0;
        $valorConvertido = 0;
      
        if ($moedaDestino === 'USD') {
            $cotacao = TAXA_DOLAR;
            $valorConvertido = $valorFloat / $cotacao;
        } else if ($moedaDestino === 'EUR') {
            $cotacao = TAXA_EURO;
            $valorConvertido = $valorFloat / $cotacao;
        } else if ($moedaDestino === 'JPY') {
            $cotacao = TAXA_IENE;
            $valorConvertido = $valorFloat / $cotacao;
        }

        
        $simbolos = ['USD' => 'US$', 'EUR' => '€', 'JPY' => '¥'];
        $nomeMoeda = ['USD' => 'Dólar Americano', 'EUR' => 'Euro', 'JPY' => 'Iene Japonês'];

        $valorOriginalFormatado = 'R$ ' . number_format($valorFloat, 2, ',', '.');
        $valorConvertidoFormatado = $simbolos[$moedaDestino] . ' ' . number_format($valorConvertido, 2, ',', '.');
        $cotacaoFormatada = 'R$ ' . number_format($cotacao, 3, ',', '.');

        $textoSucesso = "{$valorOriginalFormatado} equivalem a <strong>{$valorConvertidoFormatado}</strong>.";
        $textoSucesso .= "<br><small>Cotação ({$nomeMoeda[$moedaDestino]}): 1 {$simbolos[$moedaDestino]} = {$cotacaoFormatada}</small>";
        
        
        $htmlResultado = "<div class=\"mensagem-sucesso\">{$textoSucesso}</div>";
    }
} else {
    
    $htmlResultado = "<p>Preencha o formulário na página inicial para realizar uma conversão.</p>";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado da Conversão</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
    <div class="container">
        <h1>Resultado da Conversão</h1>
        <div class="resultado">
            <?php
                
                echo $htmlResultado;
            ?>
        </div>
        
        <a href="../index.html" class="link-voltar">Fazer Nova Conversão</a>
    </div>
</body>
</html>
