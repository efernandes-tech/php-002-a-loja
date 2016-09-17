<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>

<?php
$resultado = mysqli_query($conexao, "select * from produtos");

while ($produto = mysqli_fetch_assoc($resultado)) {
    echo $produto['nome'] . "<br/>";
}
?>

<?php include("rodape.php"); ?>