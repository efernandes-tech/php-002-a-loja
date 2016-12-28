<?php

require_once("cabecalho.php");
require_once("banco-categoria.php");
require_once("banco-produto.php");
require_once("logica-usuario.php");

verificaUsuario();

$categorias = listaCategorias($conexao);

$id = $_GET['id'];

$produto = buscaProduto($conexao, $id);

$usado = $produto['usado'] ? "checked='checked'" : "";

?>

<h1>Alterando produto</h1>

<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto['id']?>" />
    <table>
        <?php require_once("produto-formulario-base.php"); ?>
        <tr>
            <td><input type="submit" value="Alterar" class="btn btn-primary" /></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>