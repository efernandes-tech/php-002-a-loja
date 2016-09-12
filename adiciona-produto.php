<?php include("cabecalho.php"); ?>

<?php
$nome = $_GET["nome"];
$preco = $_GET["preco"];

// Interpolar string e variavel usando o { }.
$query = "insert into produtos (nome, preco) values ('{$nome}', {$preco})";

$conexao = mysqli_connect("localhost", "root", "usbw", "php-004-loja");

mysqli_query($conexao, $query);

if (mysqli_query($conexao, $query)) {
?>
    <p class="alert-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso!</p>
<?php
} else {
?>
    <p class="alert-danger">O produto <?php echo $nome; ?> não foi adicionado</p>
<?php
}

mysqli_close($conexao);
?>

<?php include("rodape.php"); ?>