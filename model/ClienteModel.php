<?php
require_once 'conexao.php';

class Cliente extends Conexao {
    private $id;
    private $nome;
    private $nascimento;
    private $salario;
    private $codCidade;
    private $tabela = 'cliente';

    // construtor
    public function __construct() {
        parent::__construct();
    }

    // getter e setter
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getCodCidade() {
        return $this->codCidade;
    }

    public function setCodCidade($codCidade) {
        $this->codCidade = $codCidade;
    }

    // consulta no banco
    public function consulta() {
        $sql = "SELECT id, nome, nascimento, salario, codCidade FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultaID($id) {
        $sql = "SELECT nome, nascimento, salario, codCidade FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setNascimento($result['nascimento']);
            $this->setSalario($result['salario']);
            $this->setCodCidade($result['codCidade']);
        }
    }

    public function inserir($nome, $nascimento, $salario, $cidade) {
        $sql = "INSERT INTO $this->tabela (nome, nascimento, salario, codCidade) VALUES (:nome, :nascimento, :salario, :cidade)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':salario', $salario, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editar($nome, $nascimento, $salario, $cidade, $id) {
        $sql = "UPDATE $this->tabela SET nome = :nome, nascimento = :nascimento, salario = :salario, codCidade = :cidade WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $nascimento, PDO::PARAM_STR);
        $stmt->bindParam(':salario', $salario, PDO::PARAM_STR);
        $stmt->bindParam(':cidade', $cidade, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>