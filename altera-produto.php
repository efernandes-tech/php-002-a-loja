<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-produto.php"); ?>

<?php

$id = $_POST['id'];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado', $_POST)) {
    $usado = "1";
} else {
    $usado = "0";
}

if (alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado)) {
?>
    <p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> alterado com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">O produto <?= $nome; ?> não foi alterado: <?= $msg; ?></p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente.
mysqli_close($conexao);

?>

<?php include("rodape.php"); ?>