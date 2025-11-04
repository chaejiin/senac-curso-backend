<?php
class Funcionario{
    public $nome;
    public $departamento;
    public $cargo;
    public $salario;

    public function __construct($nome,$departamento,$cargo,$salario){
        $this->nome = $nome;
        $this->departamento = $departamento;
        $this->cargo = $cargo;
        $this->salario = $salario;
        
    }

    public function exibirInformacoes(){
        echo "<h2> Informações do funcionário </h2>";
        echo "<strong> Nome: </strong>" .htmlspecialchars($this->nome). "<br>";
        echo "<strong> Departamento: </strong>" .htmlspecialchars($this->departamento). "<br>";
        echo "<strong> Cargo: </strong>" .htmlspecialchars($this->cargo). "<br>";
        echo "Salário: R$".number_format($this->salario,2,',','.'). "<br>";
    }
}

?>