<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>

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
	    </tr>

	<?php
	endforeach
	?>
</table>

<?php include("rodape.php"); ?>