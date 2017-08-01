<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

$produtoDAO = new produtoDAO($conexao);

$produtos = $produtoDAO->listaProdutos();

?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preço</th>
            <th>Imposto</th>
            <th>Preço Com Desconto</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>ISBN</th>
            <th>Ação 1</th>
            <th>Ação 2</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($produtos as $produto) :
    ?>
        <tr>
            <td><?= $produto->getNome() ?></td>
            <td>R$ <?= $produto->getPreco() ?></td>
            <td><?= $produto->calculaImposto() ?></td>
            <td>R$ <?= $produto->precoComDesconto(); ?></td>
            <td><?= substr($produto->getDescricao(), 0, 40) ?></td>
            <td><?= $produto->getCategoria()->getNome() ?></td>
            <td>
                <?php
                    if ($produto->temIsbn()) {
                        echo "ISBN: ".$produto->getIsbn();
                    }
                ?>
            </td>
            <td><a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto->getId()?>">Alterar</a></td>
            <td>
                <!-- Não remover com link, pois o GET server somente para pegar dados, e tmb pq se o robo do Google acessar esta pagina, ele vai apagar tudo. -->
                <!-- <a href="remove-produto.php?id=< ?= $produto['id'] ? >" class="text-danger">remover</a> -->
                <form action="remove-produto.php" method="post">
                    <input type="hidden" name="id" value="<?=$produto->getId()?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

<?php require_once("rodape.php"); ?>