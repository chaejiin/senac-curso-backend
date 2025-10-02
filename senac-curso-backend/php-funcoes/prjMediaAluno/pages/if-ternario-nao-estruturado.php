<?php
function darBoasVindas()
{
    $hora = time();
    echo "Hello World Function, {$hora}";
}
 
function calcularMedia($arrayNotas)
{
    $resultado = array_sum($arrayNotas) / count($arrayNotas);
    return $resultado;
}
 
function verificarAprovacao($umaMedia)
{
    if ($umaMedia >= 7) {
        return true;
    } else {
        return false;
    }
}

// Parâmetros e argumentos de funções
// function chamarProfessor(nomeProfessor): void{
// }
// o parâmetro vai dentro do parênteses

// function pularNumeroDeVezes(qtdPulos): void{
// }

// pode ter quantos parâmetros quiser dentro da função ex.: function chamarProfessor(nomeprofessor,local){
//}

 
function passouMedia($aprovacao){
     return $mensagemAprovacao = $aprovacao == true ? "Você passou de ano" : "Você reprovou de ano" ;
 
    //if ($aprovacao=true) {
    //   $mensagemAprovacao= "Você passou de ano";
    //} else{
    //    $mensagemAprovacao= "Você reprovou de ano";
    //}
   
}
 
$nome = trim($_GET['nome']);
$notas = $_GET['notas'];
$mensagemAprovacao="";
$media=calcularMedia($notas);
$aprovacao=verificarAprovacao($media);
$passouMedia= passouMedia($aprovacao);
$media=number_format($media, 2, ',', '.');
$mensagem="Olá, {$nome}! Sua média é: {$media}";
$mensagem2=$passouMedia;

  
//$mensagemBoasVindas = "Olá, {$nome}! Sua média é: {$media}";
//if ($media >= 7) {
//    $mensagemResultado = "Parabéns, você foi aprovado!";
//} else {
//    $mensagemResultado =  "Infelizmente, você foi reprovado.";
//}
 
//darBoasVindas();

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
        <p><?= $mensagem ?></p>
        <p id="<?= $aprovacao == true ? "aprovado" : "reprovado"; ?>"><?= $mensagem2 ?></p>
    </main>
</body>

</html>