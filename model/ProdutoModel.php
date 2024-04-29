<?php
    require_once 'conexao.php';

    Class Produto extends conexao{
        private $id;
        private $categoria;
        private $nome;
        private $descricao;
        private $valor;
        private $tabela = 'produto';

	//construtor
    public function __construct(){
        parent::__construct();	
    }

    //getter e setter

    public function getId() {
        return $this->id;
    }
    	
    public function setId( $id){
        $this->id = $id;
    }

	public function getCategoria() {
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

	public function getNome() {
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }

	public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

	public function getValor() {
        return $this->valor;
    }
	public function setValor($valor){
    $this->valor = $valor;
    }

	
    //consulta no banco
    public function consulta(){
        $sql = "SELECT id,categoria,nome,descricao,valor FROM $this->tabela";
        $result = $this->conn->query($sql) 
        or die("Falha na consulta");
        
        if($result == true){
            return $result;
        }else{
            die("Falha na consulta!");
        }
        $this->conn->close();
    }

    public function consultaID($id){
        $categoria = ''. $nome = '';  $descricao = ''; $valor = '';
        $sql = "SELECT categoria,nome,descricao,valor FROM $this->tabela
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        if($stmt == true){
            $stmt->store_result();
            $stmt->bind_result($categoria, $nome, $descricao, $valor);
            $stmt->fetch();
            $this->setCategoria($categoria);
            $this->setNome($nome);
            $this->setDescricao($descricao);
            $this->setValor($valor);
        }else{
            die("Falha na consulta!");
        }
        $stmt->close();
        $this->conn->close();	
    }

    public function inserir($categoria, $nome, $descricao, $valor){
        $sql = "INSERT INTO $this->tabela(categoria,nome,descricao,valor) VALUES(?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssd',$categoria, $nome, $descricao, $valor);
        $stmt->execute();
        
        if($stmt != true){
            die("Falha no cadastro!");
        }
        $stmt->close();
        $this->conn->close();
    }

    public function editar($categoria, $nome, $descricao, $valor, $id){
        $sql = "UPDATE $this->tabela SET categoria = ?, nome = ?, descricao = ?, valor = ?
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sssdi',$categoria, $nome, $descricao, $valor, $id);
        $stmt->execute();
        
        if($stmt != true){
            die("Falha no atualizar!");
        }
        $stmt->close();
        $this->conn->close();	
    }

    public function excluir($id){
        $sql = "DELETE FROM $this->tabela
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        
        if($stmt != true){
            die("Falha ao excluir!");
        }
        $stmt->close();
        $this->conn->close();
    }

}

?>