<?php

$aluno1 = trim($_GET["aluno1"]);
$aluno2 = trim($_GET["aluno2"]);
$aluno3 = trim($_GET["aluno3"]);

$mensagem = "";
$mensagem2= "";


if ($aluno1 == null || $aluno2 == null || $aluno3 == null) {
    echo "Valores vazios";
} else if (strlen($aluno1) < 2 || strlen($aluno2) < 2 || strlen($aluno3) < 2) {
    echo "Um nome precisa de no mínimo dois caracteres";
} else {
    $alunos = [$aluno1, $aluno2, $aluno3]; //criação de array vazio
    $professores = array("Pardal", "Tibúrcio", "Girafales", "Juquinha"); //criação de array populado
    //quando usa a palavra array usa () quando quer fazer sem escrever usa [] ou seja também poderia ser professores = ["Pardal", "Tibúrcio", "Girafales", "Juquinha"]

    // var_dump($alunos);
    // var_dump($professores);

    for ($i = 0; $i < count($alunos); $i++) { //3
        $mensagem = $mensagem . "<li>" . $alunos[$i] . "</li>";

        //Aqui seria uma forma de fazer manual de fazer, mas é contraprodutivo. 
        // $mensagem = $mensagem . "<li>". $alunos[0] ."</li>";
        // $mensagem = $mensagem . "<li>" . $alunos[1] ."</li>";
        // $mensagem = $mensagem . "<li>" . $alunos[2] ."</li>";
    }

    for ($i = 0; $i < count($professores); $i++) { //4
        $mensagem2 = $mensagem2 . "<li>" . $professores[$i] . "</li>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Escola</title>
</head>

<body>
    <h1>Lista Escola</h1>
    <h2> Lista Alunos</h2>
    <ul>
        <?php echo $mensagem; ?>
    </ul>

    <h2> Lista professores</h1>
        <ul>
            <?php echo $mensagem2; ?>
        </ul>


</body>

</html>