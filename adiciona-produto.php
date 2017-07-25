<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST["categoria_id"]);

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$isbn = $_POST['isbn'];
$tipoProduto = $_POST['tipoProduto'];

if(array_key_exists("usado", $_POST)) {
    $usado = "1";
} else {
    $usado = "0";
}

if ($tipoProduto == "Livro") {
    $produto = new Livro($nome, $preco, $descricao, $categoria, $usado);
    $produto->setIsbn($isbn);
} else {
    $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
}

$produtoDAO = new produtoDAO($conexao);

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
