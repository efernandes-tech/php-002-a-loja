<tr>
    <td>Nome</td>
    <td><input type="text" name="nome" value="<?=$produto->nome?>" class="form-control" /></td>
</tr>
<tr>
    <td>Preço</td>
    <td><input type="number" name="preco" value="<?=$produto->preco?>" class="form-control" /></td>
</tr>
<tr>
    <td>Descrição</td>
    <td><textarea name="descricao" class="form-control"><?=$produto->descricao?></textarea></td>
</tr>
<?php
$usado = $produto->usado ? "checked='checked'" : "";
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
            $essaEhACategoria = $produto->categoria->id == $categoria->id;
            $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
            <option value="<?=$categoria->id?>" <?=$selecao?>>
                <?=$categoria->nome?>
            </option>
        <?php endforeach; ?>
        </select>
    </td>
</tr>