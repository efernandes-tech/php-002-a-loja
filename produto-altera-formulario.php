<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

verificaUsuario();

$id = $_GET['id'];

$produtoDAO = new ProdutoDAO($conexao);

$produto = $produtoDAO->buscaProduto($id);

$categoriaDAO = new CategoriaDAO($conexao);

$categorias = $categoriaDAO->listaCategorias();

$selecao_usado = $produto->isUsado() ? "checked='checked'" : "";
$produto->setUsado($selecao_usado);

?>

<h1>Alterando produto</h1>

<form action="altera-produto.php" method="post">
    <input type="hidden" name="id" value="<?=$produto->getId()?>" />
    <table class="table">
        <?php require_once("produto-formulario-base.php"); ?>
        <tr>
            <td><input type="submit" value="Alterar" class="btn btn-primary" /></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>