<?php
    define('inserirProduto', '../controller/ProdutoController.php?action=inserirProduto');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    .mobile {
        width: 360px;
    }
    </style>

<body>
    <div class="container">
        <h1>Produtos</h1>

        <form class="mobile" method='post' action="<?=inserirProduto?>">
            <label class="form-label">Categoria: </label>
            <input class="form-control" type="text" placeholder="Categoria" name="txtCategoria" />

            <label class="form-label">Nome: </label>
            <input class="form-control" type="text" placeholder="Nome do Produto" name="txtNome" />

            <label class="form-label">Descrição: </label>
            <textarea class="form-control" m-label" cols="20" rows="4" placeholder="Descrição do Produto"
                name="txtDescricao"></textarea>

            <label class="form-label">Valor: </label>
            <input class="form-control" type="text" placeholder="valor" name="txtValor" />

            <input class="btn btn-danger mt-2" type="submit" value="Limpar" />
            <input class="btn btn-success mt-2" type="submit" value="Salvar" />
        </form>
        <hr>

        <?php
        require_once('consultaProduto.php');

        if( isset($_REQUEST["campoVazio"])){
            echo "<script> alert('Todos os campos devem ser preenchidos!'); </script>";
        }

        if( isset($_GET["nome"])){
            $nome = $_GET["nome"];
            echo "<script> alert('Produto $nome cadastrada com sucesso!'); </script>";
        }

        if( isset($_GET["novoNome"])){
            $novoNome = $_GET["novoNome"];
            echo "<script> alert('Produto $novoNome alterado com sucesso!'); </script>";
        }

        if( isset($_GET["excluido"])){
            echo "<script> alert('Produto excluído com sucesso!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Falha! Nao foi possível cadastrar!'); </script>";
        }
    ?>
    </div>
</body>

</html>