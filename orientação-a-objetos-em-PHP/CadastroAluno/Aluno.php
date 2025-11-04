<?php
class Aluno{
    private string $nome;
    private string $cidade;
    private string $bairro;
    private string $curso;
   
    public function __construct (string $nome1, string $cidade1,
    string $bairro1, string $curso1) {
        $this->nome = $nome1;
        $this->cidade = $cidade1;
        $this->bairro = $bairro1;
        $this->curso = $curso1;
    }
public function exibirInformacoes(){
    echo "<h2> Informações do Aluno</h2>";
    echo "<strong> Nome: </strong>".htmlspecialchars($this->nome)."<br>";
    echo "<strong> Cidade: </strong>".htmlspecialchars($this->cidade)."<br>";
    echo "<strong> Bairro: </strong>".htmlspecialchars($this->bairro)."<br>";
    echo "<strong> Curso: </strong>".htmlspecialchars($this->curso)."<br>";
}
 
 
 
 
 
}
 
?>
 