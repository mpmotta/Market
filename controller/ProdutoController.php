<?php
    require_once('../model/ProdutoModel.php');

    class ProdutoController {

        public function consultar() {
            $Produto = new Produto();
            $result = $Produto->consulta();
            return $result;
        }

        public function consultaID($id) {
            $Produto = new Produto();
            $Produto->consultaID($id);
            return $Produto;
        }

        public function inserir() {

            $categoria = $_POST['txtCategoria'];
            $nome = $_POST['txtNome'];
            $descricao = $_POST['txtDescricao'];
            $valor = $_POST['txtValor'];
           
            if(strlen( $categoria ) == 0 || strlen( $nome ) == 0 || strlen( $descricao ) == 0 || strlen( $valor ) == 0  ){
                 header( "Location: ../view/Produtos.php?campoVazio");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $Produto = new Produto();
                $Produto->inserir($categoria, $nome, $descricao, $valor);
                header('Location: ../view/Produtos.php?nome='.$nome);
            } else {
                header( "Location: ../view/Produtos.php?erro");
            }
        }

        public function editar() {
            $id = $_POST['id'];
            $categoria = $_POST['txtCategoria'];
            $nome = $_POST['txtNome'];
            $descricao = $_POST['txtDescricao'];
            $valor = $_POST['txtValor'];
            
            if(strlen( $categoria ) == 0 || strlen( $nome ) == 0 || strlen( $descricao ) == 0 || strlen( $valor ) == 0  ){
                 header( "Location: ../view/editarProduto.php?id=$id&nomeVazio");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
                $Produto = new Produto();
                $Produto->editar($categoria, $nome, $descricao, $valor, $id);
                header( "Location: ../view/Produtos.php?novoNome=$nome");
            } else {
                header( "Location: ../view/editarProduto.php?id=$id&erro");
            }
        }

        
        public function excluir() {
            $id = $_GET['id'];
            $Produto = new Produto();
            $Produto->excluir($id);
            header( "Location: ../view/Produtos.php?excluido");
        }
        
        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'inserirProduto') {
                $this->inserir();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarProduto') {
                $this->editar();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'excluirProduto') {
                $this->excluir();
            }
        }
    }
    $ProdutoController = new ProdutoController();
    $ProdutoController->handleRequest();