<tr>
    <td>Nome</td>
    <td><input type="text" name="nome" value="<?=$produto->getNome()?>" class="form-control" /></td>
</tr>
<tr>
    <td>Preço</td>
    <td><input type="number" name="preco" value="<?=$produto->getPreco()?>" class="form-control" /></td>
</tr>
<tr>
    <td>Descrição</td>
    <td><textarea name="descricao" class="form-control"><?=$produto->getDescricao()?></textarea></td>
</tr>
<?php
$usado = $produto->getUsado() ? "checked='checked'" : "";
?>
<tr>
    <td></td>
    <td><input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
</tr>
<tr>
    <td>Categoria</td>
    <td>
        <select name="categoria_id" class="form-control">
        <?php foreach($categorias as $categoria) :
            $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
            $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
            <option value="<?=$categoria->getId()?>" <?=$selecao?>>
                <?=$categoria->getNome()?>
            </option>
        <?php endforeach; ?>
        </select>
    </td>
</tr>