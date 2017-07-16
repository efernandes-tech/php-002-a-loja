<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

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

$produtoDAO = new ProdutoDAO($conexao);

if ($produtoDAO->insereProduto($produto)) {
?>
    <p class="text-success">
        Produto <?= $produto->getNome(); ?>, <?= $produto->getPreco(); ?> adicionado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">
        O produto <?= $produto->getNome(); ?> não foi adicionado: <?= $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once("rodape.php");

?>
