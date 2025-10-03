<?php

define('TAXA_DOLAR', 5.25);
define('TAXA_EURO', 5.60);
define('TAXA_IENE', 0.035);


function validarEntradas($valor, $moeda): string|true
{
    if (empty($valor)) {
        return "Erro: O campo de valor não pode estar vazio.";
    }

    $valorNumerico = str_replace(',', '.', $valor);
    if (!is_numeric($valorNumerico)) {
        return "Erro: O valor informado ('{$valor}') não é um número válido.";
    }
    if ($valorNumerico <= 0) {
        return "Erro: O valor para conversão deve ser maior que zero.";
    }
    if (empty($moeda)) {
        return "Erro: Por favor, escolha uma moeda para a conversão.";
    }

    if (!in_array($moeda, ['USD', 'EUR', 'JPY'])) {
        return "Erro: Moeda selecionada é inválida.";
    }
    return true;
}


function exibirMensagem(string $texto, string $tipo = 'sucesso'): string
{
    $classeCss = ($tipo === 'erro') ? 'mensagem-erro' : 'mensagem-sucesso';
    return "<div class=\"{$classeCss}\">{$texto}</div>";
}


function realizarConversao(float $valor, string $moeda): array
{
    $resultado = ['valorConvertido' => 0, 'cotacao' => 0, 'erro' => null];

    switch ($moeda) {
        case 'USD':
            $resultado['cotacao'] = TAXA_DOLAR;
            $resultado['valorConvertido'] = $valor / $resultado['cotacao'];
            break;

        case 'EUR':
            $resultado['cotacao'] = TAXA_EURO;
            $resultado['valorConvertido'] = $valor / $resultado['cotacao'];
            break;

        case 'JPY':
            $resultado['cotacao'] = TAXA_IENE;
            $resultado['valorConvertido'] = $valor / $resultado['cotacao'];
            break;

        default:
            $resultado['erro'] = "Moeda de conversão não suportada.";
            break;
    }

    return $resultado;
}


$htmlResultado = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $valorRealInput = $_POST['valor'] ?? null;
    $moedaDestino = $_POST['moeda'] ?? null;


    $validacao = validarEntradas($valorRealInput, $moedaDestino);

    if ($validacao !== true) {

        $htmlResultado = exibirMensagem($validacao, 'erro');
    } else {

        $valorFloat = (float) str_replace(',', '.', $valorRealInput);
        $conversao = realizarConversao($valorFloat, $moedaDestino);

        if ($conversao['erro'] !== null) {
            $htmlResultado = exibirMensagem($conversao['erro'], 'erro');
        } else {

            $simbolos = ['USD' => 'US$', 'EUR' => '€', 'JPY' => '¥'];
            $nomeMoeda = ['USD' => 'Dólar Americano', 'EUR' => 'Euro', 'JPY' => 'Iene Japonês'];

            $valorOriginalFormatado = 'R$ ' . number_format($valorFloat, 2, ',', '.');
            $valorConvertidoFormatado = $simbolos[$moedaDestino] . ' ' . number_format($conversao['valorConvertido'], 2, ',', '.');
            $cotacaoFormatada = 'R$ ' . number_format($conversao['cotacao'], 3, ',', '.');

            $textoSucesso = "{$valorOriginalFormatado} equivalem a <strong>{$valorConvertidoFormatado}</strong>.";
            $textoSucesso .= "<br><small>Cotação ({$nomeMoeda[$moedaDestino]}): 1 {$simbolos[$moedaDestino]} = {$cotacaoFormatada}</small>";

            $htmlResultado = exibirMensagem($textoSucesso, 'sucesso');
        }
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