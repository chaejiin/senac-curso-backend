<?php

$regionName = htmlspecialchars(filter_input(INPUT_GET, "regiaoBuscada", FILTER_DEFAULT));
$countries = [];
$mensagem = "";

if (!empty($regionName)) {
    
    $url = "https://restcountries.com/v3.1/region/" . urlencode($regionName);

    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    
    if ($httpCode == 404) {
        $mensagem = "Região não encontrada. Tente 'Europe', 'Asia', 'Africa', 'Oceania', 'Americas'.";
    } elseif ($httpCode == 200) {
        $countries = json_decode($response, true);
        if (empty($countries)) {
            $mensagem = "Nenhum país encontrado para esta região.";
        }
    } else {
        $mensagem = "Erro ao acessar a API. Código: " . $httpCode;
    }
} else {
    $mensagem = "Por favor, digite o nome de uma região.";
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
    <h1>Resultados para a região: <?= htmlspecialchars($regionName) ?></h1>

    <?php if (!empty($mensagem)) : ?>
        <p class="error"><?= $mensagem ?></p>
    <?php endif; ?>

    <div id="countries-list">
        <?php
        
        if (!empty($countries)) {
            foreach ($countries as $country) {
                $commonName = $country['name']['common'] ?? 'N/A';
                $officialName = $country['name']['official'] ?? 'N/A';
                $capital = $country['capital'][0] ?? 'N/A';
                $population = number_format($country['population'], 0, ',', '.');

                echo "<div class='country-card'>";
                echo "<h3>" . htmlspecialchars($commonName) . "</h3>";
                echo "<p><strong>Nome Oficial:</strong> " . htmlspecialchars($officialName) . "</p>";
                echo "<p><strong>Capital:</strong> " . htmlspecialchars($capital) . "</p>";
                echo "<p><strong>População:</strong> " . $population . "</p>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <a href="../index.html"> Nova busca</a>
</body>
</html>
