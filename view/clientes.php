<?php
    define('inserirCliente', '../controller/ClienteController.php?action=inserirCliente');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    .mobile {
        width: 480px;
    }
    </style>

<body>
    <div class="container mobile">
        <h1>Clientes</h1>

        <form method='post' action="<?=inserirCliente?>">
            <label class="form-label">Nome: </label>
            <input class="form-control" type="text" placeholder="Nome" name="txtNome" />

            <label class="form-label">Nascimento: </label>
            <input class="form-control" type="date" placeholder="nascimento" name="txtNascimento" />

            <label class="form-label">Salário: </label>
            <input class="form-control" type="text" placeholder="salario" name="txtSalario" />

            <label class="form-label">Código Cidade: </label>
            <input class="form-control" type="text" placeholder="cidade" name="txtCidade" />

            <input class="btn btn-danger mt-2" type="submit" value="Limpar" />
            <input class="btn btn-success mt-2" type="submit" value="Salvar" />
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
    </div>
</body>

</html>