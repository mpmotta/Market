<?php
    define('inserirCidade', '../controller/cidadeController.php?action=inserirCidade');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja - Cidades</title>
</head>

<body>
    <h1>Cidades</h1>

    <form method='post' action="<?=inserirCidade?>">
        <label>Nome: </label>
        <input type="text" placeholder="Digite o nome da cidade..." name="txtNome" />
        <br>
        <input type="submit" value="Salvar" />
        <input type="reset" value="Limpar" />
    </form>
    <hr>

    <?php
        require_once('consultaCidade.php');

        if( isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
        }

        if( isset($_GET["nome"])){
            $nome = $_GET["nome"];
            echo "<script> alert('Cidade $nome cadastrada com sucesso!'); </script>";
        }

        if( isset($_GET["novoNome"])){
            $novoNome = $_GET["novoNome"];
            echo "<script> alert('Cidade $novoNome alterada com sucesso!'); </script>";
        }

        if( isset($_GET["excluido"])){
            echo "<script> alert('Cidade excluída com sucesso!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Falha! Nao foi possível cadastrar!'); </script>";
        }
    ?>

</body>

</html>