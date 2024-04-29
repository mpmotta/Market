<?php   
    require_once '../controller/clienteController.php';
    $controller = new ClienteController();
    $result = $controller->consultar();
;
    define('excluirCliente', '../controller/clienteController.php?action=excluirCliente&id=');

    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nascimento</th>
                <th>Salário</th>
                <th>Cidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>";
            foreach ($result as $linha){
                    $id = $linha['id'];
                    $nome = $linha['nome'];
                    $nascimento = $linha['nascimento'];
                    $nascimento = date('d/m/Y', strtotime($nascimento));
                    $salario = $linha['salario'];
                    $salario = "R$ " . number_format($salario, 2, ',', '.');
                    $cidade = $linha['codCidade'];
                    
                    
                echo"<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$nascimento</td>
                        <td>$salario</td>
                        <td>$cidade</td>
                        <td><a href='editarCliente.php?id=$id'>editar</a></td>
                        <td><a onclick='return confirm(\"Tem certeza?\")' 
                        href='".excluirCliente . $id."'>excluir</a></td>
                     </tr>";   
            }
        ?>
</table>