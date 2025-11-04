<?php
// Captura os nomes dos alunos vindos do index.html
$aluno1 = trim($_GET["aluno1"] ?? '');
$aluno2 = trim($_GET["aluno2"] ?? '');
$aluno3 = trim($_GET["aluno3"] ?? '');

// Validação básica
if (empty($aluno1) || empty($aluno2) || empty($aluno3)) {
    echo "<h1>Por favor, preencha todos os nomes e volte.</h1>";
    exit;
}

// Prepara os nomes para exibição segura no HTML
$aluno1_safe = htmlspecialchars($aluno1);
$aluno2_safe = htmlspecialchars($aluno2);
$aluno3_safe = htmlspecialchars($aluno3);

// Monta o Bloco de Código 1 para exibir ao aluno
$codigo_alunos = <<<PHP
/*
 * Atividade: TEMA 1 - Manipulando a lista de Alunos
 * Array_splice() para SUBSTITUIR elementos.
*/

// 1. O array é inicializado com os nomes do formulário:
\$alunos = ["$aluno1_safe", "$aluno2_safe", "$aluno3_safe"];

// 2. A variável \$removido vai guardar o aluno que sair da lista.
\$removido = [];

// 3. A MÁGICA ACONTECE AQUI:
<span class="placeholder">// [ PREENCHA A LACUNA DA QUESTÃO 1 AQUI ]</span>
PHP;


// Monta o Bloco de Código 2 para exibir ao aluno
$codigo_professores = <<<PHP
/*
 * Atividade: TEMA 2 - Adicionando um novo Professor
 * Array_splice() para INSERIR elementos sem remover nada.
*/

// 1. Temos uma lista fixa de professores:
\$professores = ["Prof. Pardal", "Prof. Girafales", "Prof. Juquinha"];

// 2. A MÁGICA ACONTECE AQUI:
<span class="placeholder">// [ PREENCHA A LACUNA DA QUESTÃO 2 AQUI ]</span>
PHP;

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Desafio Duplo: Array Splice</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .placeholder { color: #080893; font-weight: bold; display: block; text-align: center; background-color: #e0e0ff; padding: 10px; border-radius: 4px; margin: 10px 0; }
        pre { white-space: pre-wrap; word-wrap: break-word; }
        fieldset { margin-bottom: 25px; }
    </style>
</head>
<body>
    <h1>Desafio Duplo: Array Splice</h1>

    <form id="resultado" action="./resultado.php" method="post">
        <input type="hidden" name="aluno1" value="<?php echo $aluno1_safe; ?>">
        <input type="hidden" name="aluno2" value="<?php echo $aluno2_safe; ?>">
        <input type="hidden" name="aluno3" value="<?php echo $aluno3_safe; ?>">

        <fieldset>
            <legend><strong>Questão 1: Substituir Aluno</strong></legend>
            <p><strong>Missão:</strong> Substituir o(a) aluno(a) na posição 1 ("<?php echo $aluno2_safe; ?>") pela nova aluna "Beatriz".</p>
            <pre><code class="language-php"><?php echo $codigo_alunos; ?></code></pre>
            <label for="q1_resposta"><strong>Qual código substitui o aluno corretamente?</strong></label>
            <select name="q1_resposta" id="q1_resposta" required>
                <option value="">Selecione uma opção</option>
                <option value="opcao1_correta">array_splice($alunos, 1, 1, "Beatriz");</option>
                <option value="opcao1_errada1">array_splice($alunos, 1, 0, "Beatriz");</option>
                <option value="opcao1_errada2">array_push($alunos, "Beatriz");</option>
            </select>
        </fieldset>

        <fieldset>
            <legend><strong>Questão 2: Adicionar Professor</strong></legend>
            <p><strong>Missão:</strong> Adicionar o "Prof. Tibúrcio" ao <strong>final</strong> da lista de professores, sem remover ninguém.</p>
            <pre><code class="language-php"><?php echo $codigo_professores; ?></code></pre>
            <label for="q2_resposta"><strong>Qual código adiciona o professor ao final da lista?</strong></label>
            <select name="q2_resposta" id="q2_resposta" required>
                <option value="">Selecione uma opção</option>
                <option value="opcao2_correta">array_splice($professores, count($professores), 0, "Prof. Tibúrcio");</option>
                <option value="opcao2_errada1">array_push($professores, "Prof. Tibúrcio");</option>
                <option value="opcao2_errada2">array_splice($professores, 2, 1, "Prof. Tibúrcio");</option>
            </select>
        </fieldset>

        <input type="submit" value="Verificar Respostas">
    </form>
</body>
</html>