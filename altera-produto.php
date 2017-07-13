<?php

require_once("cabecalho.php");

require_once("banco-produto.php");

require_once("logica-usuario.php");

require_once("class/Produto.php");

require_once("class/Categoria.php");

verificaUsuario();

$produto = new Produto();

$produto->id = $_POST["id"];
$produto->nome = $_POST["nome"];
$produto->preco = $_POST["preco"];
$produto->descricao = $_POST["descricao"];

$categoria = new Categoria();

$categoria->id = $_POST["categoria_id"];

$produto->categoria = $categoria;

if(array_key_exists("usado", $_POST)) {
    $produto->usado = "1";
} else {
    $produto->usado = "0";
}

if (alteraProduto($conexao, $produto)) {
?>
    <p class="text-success">
        Produto <?= $produto->nome; ?>, <?= $produto->preco; ?> alterado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">
        O produto <?= $produto->nome; ?> não foi alterado: <?= $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once("rodape.php");

?>
