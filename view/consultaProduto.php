<?php   
    require_once '../controller/ProdutoController.php';
    $controller = new ProdutoController();
    $result = $controller->consultar();
;
    define('excluirProduto', '../controller/ProdutoController.php?action=excluirProduto&id=');

    echo "<table class='table table-striped'>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>";
            foreach ($result as $linha){
                    $id = $linha['id'];
                    $categoria = $linha['categoria'];
                    $nome = $linha['nome'];
                    $descricao = $linha['descricao'];
                    $valor = $linha['valor'];
                    $valor = "R$ " . number_format($valor, 2, ',', '.');
                    
                    
                echo"<tr>
                        <td>$id</td>
                        <td>$categoria</td>
                        <td>$nome</td>
                        <td>$descricao</td>
                        <td>$valor</td>
                        <td class='text-center'><a href='editarProduto.php?id=$id'>
                        <i class='fa-solid fa-pen-to-square text-success'></i>
                        </a></td>
                        <td class='text-center'><a onclick='return confirm(\"Tem certeza?\")' 
                        href='".excluirProduto . $id."'>
                        <i class='fa-solid fa-trash text-danger'></i>
                        </a></td>
                     </tr>";   
            }
        ?>
</table>