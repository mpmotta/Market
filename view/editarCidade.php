<?php
    $id = $_GET['id'];
    require_once '../controller/CidadeController.php';
    $controller = new CidadeController();
    $cidade = $controller->consultaID($id);
    $nome = $cidade->getNome();

    define('editarCidade', '../controller/CidadeController.php?action=editarCidade');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cidade</title>
</head>

<body>
    <h1>Editar Cidade</h1>

    <form method='post' action="<?=editarCidade?>">
        <label>Nome: </label>
        <input type="text" value="<?=$nome; ?>" name="txtNome" />
        <input type="hidden" value="<?=$id; ?>" name="id" />
        <br>
        <input type="submit" value="Salvar" />
        <button><a href="cidades.php">Voltar</a></button>
    </form>
</body>

</html>

<?php
        if( isset($_REQUEST["nomeVazio"])){
            echo "<script> alert('O campo nome não pode ser vazio!'); </script>";
        }

        if( isset($_REQUEST["erro"])){
            echo "<script> alert('Falha! Nao foi possível alterar!'); </script>";
        }
    ?>