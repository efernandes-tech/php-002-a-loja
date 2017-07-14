<?php

require_once("cabecalho.php");

require_once("banco-produto.php");

require_once("logica-usuario.php");

$produtos = listaProdutos($conexao);

?>

<table class="table table-striped table-bordered">
    <?php
    foreach($produtos as $produto) :
    ?>
        <tr>
            <td><?= $produto->getNome() ?></td>
            <td><?= $produto->getPreco() ?></td>
            <td><?= $produto->precoComDesconto(); ?></td>
            <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?= $produto->getCategoria()->getNome() ?></td>
            <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">alterar</a></td>
            <td>
                <!-- Não remover com link, pois o GET server somente para pegar dados, e tmb pq se o robo do Google acessar esta pagina, ele vai apagar tudo. -->
                <!-- <a href="remove-produto.php?id=< ?= $produto['id'] ? >" class="text-danger">remover</a> -->
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>" />
                    <button class="btn btn-danger">remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
</table>

<?php require_once("rodape.php"); ?>