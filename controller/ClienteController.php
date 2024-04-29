<?php
    require_once('../model/ClienteModel.php');

    class ClienteController {

        public function consultar() {
            $Cliente = new Cliente();
            $result = $Cliente->consulta();
            return $result;
        }

        public function consultaID($id) {
            $Cliente = new Cliente();
            $Cliente->consultaID($id);
            return $Cliente;
        }

        public function inserir() {

            $nome = $_POST['txtNome'];
            $nascimento = $_POST['txtNascimento'];
            $salario = $_POST['txtSalario'];
            $cidade = $_POST['txtCidade'];
            
            if(strlen( $nome ) == 0 || strlen( $nascimento ) == 0 || strlen( $salario ) == 0 || strlen( $cidade ) == 0  ){
                 header( "Location: ../view/Clientes.php?campoVazio");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $Cliente = new Cliente();
                $Cliente->inserir($nome, $nascimento, $salario, $cidade);
                header('Location: ../view/Clientes.php?nome='.$nome);
            } else {
                header( "Location: ../view/Clientes.php?erro");
            }
            
        }

        public function editar() {
            $id = $_POST['id'];
            $nome = $_POST['txtNome'];
            $nascimento = $_POST['txtNascimento'];
            $salario = $_POST['txtSalario'];
            $cidade = $_POST['txtCidade'];

            if(strlen( $nome ) == 0 || strlen( $nascimento ) == 0 || strlen( $salario ) == 0 || strlen( $cidade ) == 0  ){
                 header( "Location: ../view/editarCliente.php?id=$id&campoVazio");
            }elseif($_SERVER['REQUEST_METHOD'] === 'POST') {
                $Cliente = new Cliente();
                $Cliente->editar($nome,$nascimento,$salario,$cidade,$id);
                header( "Location: ../view/clientes.php?novoNome=$nome");
            } else {
                header( "Location: ../view/editarCliente.php?id=$id&erro");
            }
        }

        
        public function excluir() {
            $id = $_GET['id'];
            $Cliente = new Cliente();
            $Cliente->excluir($id); 
            header( "Location: ../view/clientes.php?excluido");
        }
        
        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'inserirCliente') {
                $this->inserir();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarCliente') {
                $this->editar();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'excluirCliente') {
                $this->excluir();
            }
        }
    }
    $ClienteController = new ClienteController();
    $ClienteController->handleRequest();