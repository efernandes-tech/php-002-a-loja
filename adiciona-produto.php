<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>

<?php

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST['descricao'];

if (insereProduto($conexao, $nome, $preco, $descricao)) {
?>
    <p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $nome; ?> não foi adicionado: <?= $msg; ?></p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente.
mysqli_close($conexao);

?>

<?php include("rodape.php"); ?>