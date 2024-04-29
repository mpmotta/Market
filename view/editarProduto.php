<?php
    $id = $_GET['id'];
    require_once '../controller/ProdutoController.php';
    $controller = new ProdutoController();
    $produto = $controller->consultaID($id);
    $categoria = $produto->getCategoria();
    $nome = $produto->getNome();
    $descricao = $produto->getDescricao();
    $valor = $produto->getValor();


    define('editarProduto', '../controller/ProdutoController.php?action=editarProduto');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>

<body>
    <h1>Editar Produto</h1>

    <form method='post' action="<?=editarProduto?>">
        <input type="hidden" value="<?=$id;?>" name="id">
        <label>Categoria: </label>
        <input type="text" value="<?=$categoria;?>" name="txtCategoria" />
        <br>
        <label>Nome: </label>
        <input type="text" value="<?=$nome;?>" name="txtNome" />
        <br>
        <label>Descrição: </label>
        <textarea cols="20" rows="4" name="txtDescricao"><?=$descricao;?></textarea>
        <br>
        <label>Valor: </label>
        <input type="text" value="<?=$valor;?>" name="txtValor" />
        <br>
        <input type="submit" value="Salvar" />
        <button><a href="Produtos.php">Voltar</a></button>
    </form>
</body>

</html>

<?php
        if( isset($_REQUEST["campoVazio"])){
            echo "<script> alert('Todos os campos devem ser preenchidos!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Falha! Nao foi possível alterar!'); </script>";
        }
    ?>