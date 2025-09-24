<?php
$mensagem = "";
$common = $official = $native = "";

$region = filter_input(INPUT_GET, "regiaoBuscada", FILTER_SANITIZE_STRING);

if (!empty($region)) {
    $url = "https://restcountries.com/v3.1/name/" . urlencode($region);

    $response = file_get_contents($url);

    if ($response) {
        $dados = json_decode($response, true);

        if (isset($dados['status']) && $dados['status'] == 404) {
            $mensagem = "País não encontrado.";
        } elseif ($dados[0]['region'] !== "Europe") {
            $mensagem = "Esse país não pertence à Europa.";
        } else {
            $common = $dados[0]['name']['common'] ?? '';
            $official = $dados[0]['name']['official'] ?? '';
            $native = reset($dados[0]['name']['nativeName'])['common'] ?? '';
        }
    } else {
        $mensagem = "Erro ao acessar a API RestCountries.";
    }
} else {
    $mensagem = "Digite o nome de um país da Europa.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Resultado - Busca Região</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Resultado da consulta</h1>

    <div id="regiao-buscada">
        <?php if (!empty($mensagem)) : ?>
            <p id="erro" style="color:red;"><?= $mensagem ?></p>
        <?php else : ?>
            <div>
                <label>Nome comum: </label>
                <input type="text" value="<?= htmlspecialchars($common) ?>" disabled>
            </div>
            <div>
                <label>Nome oficial: </label>
                <input type="text" value="<?= htmlspecialchars($official) ?>" disabled>
            </div>
            <div>
                <label>Nome nativo: </label>
                <input type="text" value="<?= htmlspecialchars($native) ?>" disabled>
            </div>
        <?php endif; ?>
    </div>
    <p>

        <a href="../index.html"> Nova busca</a>
    </p>
</body>

</html>