<?php

require_once("cabecalho.php");

require_once("banco-produto.php");

require_once("logica-usuario.php");

require_once("class/Produto.php");

require_once("class/Categoria.php");

verificaUsuario();

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];

if(array_key_exists("usado", $_POST)) {
    $usado = "1";
} else {
    $usado = "0";
}

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
$produto->setId($_POST["id"]);

if (alteraProduto($conexao, $produto)) {
?>
    <p class="text-success">
        Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> alterado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">
        O produto <?= $produto->getNome(); ?> não foi alterado: <?= $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once("rodape.php");

?>
