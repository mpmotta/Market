<?php   
    require_once '../controller/ProdutoController.php';
    $controller = new ProdutoController();
    $result = $controller->consultar();
;
    define('excluirProduto', '../controller/ProdutoController.php?action=excluirProduto&id=');

    echo "<table border='1'>
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
                        <td><a href='editarProduto.php?id=$id'>editar</a></td>
                        <td><a onclick='return confirm(\"Tem certeza?\")' 
                        href='".excluirProduto . $id."'>excluir</a></td>
                     </tr>";   
            }
        ?>
</table>