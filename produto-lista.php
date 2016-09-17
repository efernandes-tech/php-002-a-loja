<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>

<?php if (array_key_exists("removido", $_GET) && $_GET['removido'] == 'true') : ?>
<p class="alert-success">Produto apagado com sucesso.</p>
<?php endif; ?>

<?php
$produtos = listaProdutos($conexao);
?>

<table class="table table-striped table-bordered">

    <?php
    foreach($produtos as $produto) :
    ?>

        <tr>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td><?= substr($produto['descricao'], 0, 40) ?></td>
            <td>
                <!-- Não remover com link, pois o GET server somente para pegar dados, e tmb pq se o robo do Google acessar esta pagina, ele vai apagar tudo. -->
                <!-- <a href="remove-produto.php?id=< ?= $produto['id'] ? >" class="text-danger">remover</a> -->
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto['id']?>" />
                    <button class="btn btn-danger">remover</button>
                </form>
            </td>
        </tr>

    <?php
    endforeach;
    ?>
</table>

<?php include("rodape.php"); ?>