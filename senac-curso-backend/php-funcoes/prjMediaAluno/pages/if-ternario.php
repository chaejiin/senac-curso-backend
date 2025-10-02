<?php

//Não pode estar em branco 
//Não pode ter número no nome
//Itens do array devem ser números 
//Array não pode ser vazio 

function validarEntradas($nome, $notas)
{
    if (isset($nome) && count($notas) == 0 || (!preg_match('/^[A-Za-z\s]+$/', $nome)) && (!is_numeric($notas))){
        return false;
    } else {
        return true;
        // volta para a página de calculo - redirecionamento
    }
}

function darBoasVindas()
{
    date_default_timezone_set('America/Sao_Paulo');
    $hora = date("H:i:s"); //?
    echo "Hello World Function, {$hora}";
}

function calcularMedia(array $arrayNotas): float
{
    // Evita divisão por zero se o array estiver vazio
    if (count($arrayNotas) === 0) {
        return 0.0;
    }
    return array_sum($arrayNotas) / count($arrayNotas);
}
 
// Verifica se a média é suficiente para aprovação

function verificarAprovacao(float $umaMedia): bool
{
    // Retorna diretamente o resultado da comparação
    return $umaMedia >= 7;
}
 

// Retorna a mensagem de status (aprovado/reprovado).

function obterMensagemStatus(bool $foiAprovado): string
{
    // Usando um operador ternário para simplificar
    return $foiAprovado ? "Parabéns, você foi aprovado!" : "Infelizmente, você foi reprovado.";
}
 
$nome = isset($_GET['nome']) ? trim($_GET['nome']) : 'Visitante';
$notas = isset($_GET['notas']) && is_array($_GET['notas']) ? $_GET['notas'] : [];
if (validarEntradas($nome, $notas) == true) {
} else {
    header('location: ../index.html');
}
 
// Execução das funções
$media = calcularMedia($notas);
$foiAprovado = verificarAprovacao($media);
 
// Definição das variáveis para serem usadas no HTML
$mensagemBoasVindas = "Olá, " . htmlspecialchars($nome) . "! Sua média é: " . number_format($media, 1, ',', '.');
$mensagemResultado = obterMensagemStatus($foiAprovado);
darBoasVindas()
 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance do Aluno</title>
    <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
    <main class="container">
        <h1>Performance do Aluno</h1>
        
        <p><?= $mensagemBoasVindas ?></p>
        <p id="<?= $foiAprovado ? "aprovado" : "reprovado"; ?>"><?= $mensagemResultado ?></p>
        
    </main>
</body>
</html>