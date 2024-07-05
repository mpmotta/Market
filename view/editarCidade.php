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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .mobile {
        width: 360px;
    }
    </style>
</head>

<body>
    <div class="container mobile">
        <h1>Editar Cidade</h1>

        <form method='post' action="<?=editarCidade?>">
            <label class="form-label">Nome: </label>
            <input class="form-control" type="text" value="<?=$nome; ?>" name="txtNome" />
            <input type="hidden" value="<?=$id; ?>" name="id" />
            <br>
            <input class="btn btn-success" type="submit" value="Salvar" />
            <a class="btn btn-secondary" href="cidades.php">Voltar</a>
        </form>
    </div>
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