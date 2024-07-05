<?php
require_once 'conexao.php';

class Produto extends Conexao {
    private $id;
    private $categoria;
    private $nome;
    private $descricao;
    private $valor;
    private $tabela = 'produto';

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

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    // consulta no banco
    public function consulta() {
        $sql = "SELECT id, categoria, nome, descricao, valor FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultaID($id) {
        $sql = "SELECT categoria, nome, descricao, valor FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setCategoria($result['categoria']);
            $this->setNome($result['nome']);
            $this->setDescricao($result['descricao']);
            $this->setValor($result['valor']);
        }
    }

    public function inserir($categoria, $nome, $descricao, $valor) {
        $sql = "INSERT INTO $this->tabela (categoria, nome, descricao, valor) VALUES (:categoria, :nome, :descricao, :valor)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editar($categoria, $nome, $descricao, $valor, $id) {
        $sql = "UPDATE $this->tabela SET categoria = :categoria, nome = :nome, descricao = :descricao, valor = :valor WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
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