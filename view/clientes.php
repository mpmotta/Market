<?php
    define('inserirCliente', '../controller/ClienteController.php?action=inserirCliente');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Clientes</title>
</head>

<body>
    <h1>Clientes</h1>

    <form method='post' action="<?=inserirCliente?>">
        <label>Nome: </label>
        <input type="text" placeholder="Nome" name="txtNome" />
        <br>
        <label>Nascimento: </label>
        <input type="date" placeholder="nascimento" name="txtNascimento" />
        <br>
        <label>Salário: </label>
        <input type="text" placeholder="salario" name="txtSalario" />
        <br>
        <label>Código Cidade: </label>
        <input type="text" placeholder="cidade" name="txtCidade" />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
    <hr>

    <?php
        require_once('consultaCliente.php');

        if( isset($_REQUEST["campoVazio"])){
            echo "<script> alert('Todos os campos devem ser preenchidos!'); </script>";
        }

        if( isset($_GET["nome"])){
            $nome = $_GET["nome"];
            echo "<script> alert('Cliente $nome cadastrada com sucesso!'); </script>";
        }

        if( isset($_GET["novoNome"])){
            $novoNome = $_GET["novoNome"];
            echo "<script> alert('Cliente $novoNome alterado com sucesso!'); </script>";
        }

        if( isset($_GET["excluido"])){
            echo "<script> alert('Cliente excluído com sucesso!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Falha! Nao foi possível cadastrar!'); </script>";
        }
    ?>

</body>

</html>