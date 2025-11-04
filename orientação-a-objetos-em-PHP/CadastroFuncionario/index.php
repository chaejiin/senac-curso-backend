<?php
require_once "funcionario.php"

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastro de Funcionário</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
 
<h2>Cadastro de Funcionário</h2>
 
<form method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br>
 
    <label>Departamento:</label><br>
    <select name="departamento" required>
        <option value="">Selecione</option>
        <option>Vendas</option>
        <option>RH</option>
        <option>TI</option>
        <option>Financeiro</option>
    </select><br>
 
    <label>Cargo:</label><br>
    <input type="text" name="cargo" required><br>
 
    <label>Salário:</label><br>
    <input type="number" step="0.01" name="salario" required><br>
 
    <button type="submit">Cadastrar</button>
</form>
<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nome = $_POST["nome"];
    $departamento = $_POST["departamento"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];
    $funcionario = new Funcionario($nome,$departamento,$cargo,$salario);      
    echo"<br>";
    $funcionario->exibirInformacoes();
}

?>
 
 
</body>
</html>