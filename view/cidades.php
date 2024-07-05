<?php
    define('inserirCidade', '../controller/cidadeController.php?action=inserirCidade');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Cidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    .mobile {
        width: 360px;
    }
    </style>
</head>

<body>
    <div class="container mobile">
        <h1>Cidades</h1>
        <form method='post' action="<?=inserirCidade?>"><label class="form-label">Nome: </label><input
                class="form-control" type="text" placeholder="Digite o nome da cidade..." name="txtNome" />
            <input class="btn btn-danger mt-2" type="submit" value="Limpar" />
            <input class="btn btn-success mt-2" type="submit" value="Salvar" />
        </form>
        <hr><?php require_once('consultaCidade.php');

    if(isset($_REQUEST["nomeVazio"])) {
        echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
    }

    if(isset($_GET["nome"])) {
        $nome=$_GET["nome"];
        echo "<script> alert('Cidade $nome cadastrada com sucesso!'); </script>";
    }

    if(isset($_GET["novoNome"])) {
        $novoNome=$_GET["novoNome"];
        echo "<script> alert('Cidade $novoNome alterada com sucesso!'); </script>";
    }

    if(isset($_GET["excluido"])) {
        echo "<script> alert('Cidade excluída com sucesso!'); </script>";
    }

    if(isset($_REQUEST["erro"])) {
        echo "<script> alert('Falha! Nao foi possível cadastrar!'); </script>";
    }

    ?>
    </div>
</body>

</html>