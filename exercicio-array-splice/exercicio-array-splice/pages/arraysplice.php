<!-- Atividade: TEMA 1 Formas de inserir itens no array (e outros arrays) 

Array_splice(): Capaz de inserir elementos em posição específica tanto em php quanto no javascript -->


<?php

$aluno1 = trim($_GET["aluno1"] ?? '');
$aluno2 = trim($_GET["aluno2"] ?? '');
$aluno3 = trim($_GET["aluno3"] ?? '');

$mensagemAlunos = "";
$mensagemProfessores = "";
$mensagemRemovido = "";

if ($aluno1 == "" || $aluno2 == "" || $aluno3 == "") {
    echo "Preencha todos os nomes dos alunos.";
    exit;
} elseif (strlen($aluno1) < 3 || strlen($aluno2) < 3 || strlen($aluno3) < 3) {
    echo "Cada nome deve ter pelo menos 3 caracteres.";
    exit;
} else {

    $alunos = [$aluno1, $aluno2, $aluno3]; 
    $professores = ["Prof. Pardal", "Prof. Girafales", "Prof. Juquinha"];
    
    // Substitui o aluno na posição 1 ("aluno2") por "Beatriz"
    $removido = array_splice($alunos, 1, 1, "Beatriz"); 
    
    // Adiciona "Prof. Tibúrcio" no final do array de professores
    array_splice($professores, count($professores), 0, "Prof. Tibúrcio");

    foreach ($alunos as $aluno) {
        $mensagemAlunos .= "<li>$aluno</li>";
    }
    
    foreach ($professores as $prof) {
        $mensagemProfessores .= "<li>$prof</li>";
    }
    
    foreach ($removido as $r) {
        $mensagemRemovido .= "<li>$r</li>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Resultado - Arrays</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <main id="resultado">
        <h1>Resultado da Manipulação de Arrays</h1>

        <h2>Alunos (após alterações com array_splice)</h2>
        <ul>
            <?php echo $mensagemAlunos; ?>
        </ul>

        <h2>Professores (com novo professor adicionado)</h2>
        <ul>
            <?php echo $mensagemProfessores; ?>
        </ul>

        <h2>Aluno Removido</h2>
        <ul>
            <?php echo $mensagemRemovido; ?>
        </ul>

        <a href="../index.html">Voltar</a>
    </main> </body>

</html>



<!-- Altera o conteúdo de uma lista, adicionando novos elementos enquanto remove elementos antigos. -->



