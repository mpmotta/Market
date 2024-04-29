<?php   
    require_once '../controller/cidadeController.php';
    $controller = new CidadeController();
    $result = $controller->consultar();
;
    define('excluirCidade', '../controller/cidadeController.php?action=excluirCidade&id=');

        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>";
            
            foreach ($result as $linha){
                    $id = $linha['id'];
                    $nome = $linha['nome'];

                echo"<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td><a href='editarCidade.php?id=$id'>editar</a></td>
                        <td><a onclick='return confirm(\"Tem certeza?\")' 
                        href='".excluirCidade . $id."'>excluir</a></td>
                     </tr>";   
            }
        ?>
</table>