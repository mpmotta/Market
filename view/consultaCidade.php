<?php   
    require_once '../controller/cidadeController.php';
    $controller = new CidadeController();
    $result = $controller->consultar();
;
    define('excluirCidade', '../controller/cidadeController.php?action=excluirCidade&id=');

        echo "<table class='table table-striped'>
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
                        <td class='text-center'><a href='editarCidade.php?id=$id'>
                        <i class='fa-solid fa-pen-to-square text-success'></i></a></td>
                        <td class='text-center'><a onclick='return confirm(\"Tem certeza?\")' 
                        href='".excluirCidade . $id."'>
                        <i class='fa-solid fa-trash text-danger'></i>
                        </a></td>
                     </tr>";   
            }
        ?>
</table>