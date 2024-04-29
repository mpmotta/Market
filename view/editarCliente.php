<?php
    $id = $_GET['id'];
    require_once '../controller/ClienteController.php';
    $controller = new ClienteController();
    $Cliente = $controller->consultaID($id);
    $nome = $Cliente->getNome();
    $nascimento = $Cliente->getNascimento();
    $salario = $Cliente->getSalario();
    $cidade = $Cliente->getCodCidade();
    define('editarCliente', '../controller/ClienteController.php?action=editarCliente');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <h1>Editar Cliente</h1>

    <form method='post' action="<?=editarCliente?>">
        <input type="hidden" value="<?=$id; ?>" name="id">
        <label>Nome: </label>
        <input type="text" value="<?=$nome; ?>" name="txtNome" />
        <br>
        <label>Nascimento: </label>
        <input type="date" value="<?=$nascimento; ?>" name="txtNascimento" />
        <br>
        <label>Salário: </label>
        <input type="text" value="<?=$salario; ?>" name="txtSalario" />
        <br>
        <label>Código Cidade: </label>
        <input type="text" value="<?=$cidade; ?>" name="txtCidade" />
        <br>
        <input type="submit" value="Salvar" />
        <button><a href="Clientes.php">Voltar</a></button>
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