<?php
    define('inserirProduto', '../controller/ProdutoController.php?action=inserirProduto');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Produtos</title>
</head>

<body>
    <h1>Produtos</h1>

    <form method='post' action="<?=inserirProduto?>">
        <label>Categoria: </label>
        <input type="text" placeholder="Categoria" name="txtCategoria" />
        <br>
        <label>Nome: </label>
        <input type="text" placeholder="Nome do Produto" name="txtNome" />
        <br>
        <label>Descrição: </label>
        <textarea cols="20" rows="4" placeholder="Descrição do Produto" name="txtDescricao"></textarea>
        <br>
        <label>Valor: </label>
        <input type="text" placeholder="valor" name="txtValor" />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
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

</body>

</html>