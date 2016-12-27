<?php

include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");
include("logica-usuario.php");

verificaUsuario();

$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
if(array_key_exists('usado', $_POST)) {
    $usado = "1";
} else {
    $usado = "0";
}

if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) {
?>
    <p class="text-success">
        Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
?>
    <p class="text-danger">
        O produto <?= $nome; ?> não foi adicionado: <?= $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

include("rodape.php");

?>