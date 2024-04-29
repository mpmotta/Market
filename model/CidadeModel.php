<?php
    require_once 'conexao.php';

    Class Cidade extends conexao{
        private $id;
        private $nome;
        private $tabela = 'cidade';

	//construtor
    public function __construct(){
        parent::__construct();	
    }

    //getter e setter
    public function getId() {
        return $this->id;
    }

	public function getNome() {
        return $this->nome;
    }

	public function setId($id) {
        $this->id = $id;
    }

	public function setNome($nome) {
        $this->nome = $nome;
    }

    //consulta no banco
    public function consulta(){
        $sql = "SELECT id,nome FROM $this->tabela";
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
        $nome = '';
        $sql = "SELECT nome FROM $this->tabela
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        if($stmt == true){
            $stmt->store_result();
            $stmt->bind_result($nome);
            $stmt->fetch();
            $this->setNome($nome);
        }else{
            die("Falha na consulta!");
        }
        $stmt->close();
        $this->conn->close();	
    }

    public function inserir($nome){
        $sql = "INSERT INTO $this->tabela(nome) VALUES(?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s',$nome);
        $stmt->execute();
        
        if($stmt != true){
            die("Falha no cadastro!");
        }
        $stmt->close();
        $this->conn->close();
    }

    public function editar($nome,$id){
        $sql = "UPDATE $this->tabela SET nome = ?
        WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si',$nome,$id);
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