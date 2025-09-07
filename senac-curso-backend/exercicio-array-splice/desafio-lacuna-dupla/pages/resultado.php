<?php
// --- RECEBIMENTO E PREPARAÇÃO DOS DADOS ---
$aluno1 = trim($_POST["aluno1"] ?? '');
$aluno2 = trim($_POST["aluno2"] ?? '');
$aluno3 = trim($_POST["aluno3"] ?? '');
$resposta_q1 = $_POST["q1_resposta"] ?? '';
$resposta_q2 = $_POST["q2_resposta"] ?? '';

// --- PROCESSAMENTO DA QUESTÃO 1 (ALUNOS) ---
$alunos = [$aluno1, $aluno2, $aluno3];
$removido = [];
$feedback1 = "";
$codigo_executado1 = "";

switch ($resposta_q1) {
    case 'opcao1_correta':
        $codigo_executado1 = 'array_splice($alunos, 1, 1, "Beatriz");';
        $removido = array_splice($alunos, 1, 1, "Beatriz");
        $feedback1 = "<p class='correto'>✅ Questão 1 Correta! Você usou os parâmetros certos: índice `1`, remover `1` elemento e adicionar `'Beatriz'`.</p>";
        break;
    case 'opcao1_errada1':
        $codigo_executado1 = 'array_splice($alunos, 1, 0, "Beatriz");';
        $removido = array_splice($alunos, 1, 0, "Beatriz");
        $feedback1 = "<p class='incorreto'>❌ Questão 1 Incorreta. Ao usar `0` no segundo parâmetro, você apenas adicionou a aluna, mas não removeu a original como pedia a missão.</p>";
        break;
    case 'opcao1_errada2':
        $codigo_executado1 = 'array_push($alunos, "Beatriz");';
        array_push($alunos, "Beatriz");
        $feedback1 = "<p class='incorreto'>❌ Questão 1 Incorreta. `array_push` apenas adiciona um item ao final do array, ele não substitui um elemento no meio.</p>";
        break;
}

// --- PROCESSAMENTO DA QUESTÃO 2 (PROFESSORES) ---
$professores = ["Prof. Pardal", "Prof. Girafales", "Prof. Juquinha"];
$feedback2 = "";
$codigo_executado2 = "";

switch ($resposta_q2) {
    case 'opcao2_correta':
        $codigo_executado2 = 'array_splice($professores, count($professores), 0, "Prof. Tibúrcio");';
        array_splice($professores, count($professores), 0, "Prof. Tibúrcio");
        $feedback2 = "<p class='correto'>✅ Questão 2 Correta! `count()` acha o final da lista e o `0` garante que ninguém seja removido. Perfeito!</p>";
        break;
    case 'opcao2_errada1':
        $codigo_executado2 = 'array_push($professores, "Prof. Tibúrcio");';
        array_push($professores, "Prof. Tibúrcio");
        $feedback2 = "<p class='incorreto'>❌ Questão 2 Incorreta. Embora `array_push` chegue no mesmo resultado, o exercício pedia para resolver usando `array_splice`. É importante conhecer as duas formas!</p>";
        break;
    case 'opcao2_errada2':
        $codigo_executado2 = 'array_splice($professores, 2, 1, "Prof. Tibúrcio");';
        array_splice($professores, 2, 1, "Prof. Tibúrcio");
        $feedback2 = "<p class='incorreto'>❌ Questão 2 Incorreta. Este código removeu o último professor ('Prof. Juquinha') para adicionar o novo. A missão era adicionar sem remover ninguém.</p>";
        break;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Desafio Duplo</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .correto { color: green; font-weight: bold; }
        .incorreto { color: red; font-weight: bold; }
        code { background-color: #eee; padding: 2px 5px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Resultado do Desafio</h1>

    <div id="resultado">
        <h2>Feedback da sua Resposta</h2>
        <p><strong>Sua escolha para Alunos:</strong> <code><?php echo htmlspecialchars($codigo_executado1); ?></code></p>
        <?php echo $feedback1; ?>
        <hr style="width:100%; margin: 15px 0;">
        <p><strong>Sua escolha para Professores:</strong> <code><?php echo htmlspecialchars($codigo_executado2); ?></code></p>
        <?php echo $feedback2; ?>

        <hr style="width:100%; margin: 15px 0;">

        <h2>Alunos (lista final)</h2>
        <ul>
            <?php foreach ($alunos as $aluno) echo "<li>" . htmlspecialchars($aluno) . "</li>"; ?>
        </ul>

        <h2>Professores (lista final)</h2>
        <ul>
            <?php foreach ($professores as $prof) echo "<li>" . htmlspecialchars($prof) . "</li>"; ?>
        </ul>

        <h2>Aluno Removido</h2>
        <ul>
            <?php
            if (!empty($removido)) {
                foreach ($removido as $r) echo "<li>" . htmlspecialchars($r) . "</li>";
            } else {
                echo "<li>Nenhum aluno foi removido nesta operação.</li>";
            }
            ?>
        </ul>

        <a href="../index.html">Tentar Novamente</a>
    </div>
</body>
</html>