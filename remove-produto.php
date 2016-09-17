<?php
include("conecta.php");
include("banco-produto.php");

$id = $_POST['id'];
removeProduto($conexao, $id);

// Pagina que o browser deve redirecionar.
header("Location: produto-lista.php?removido=true");
// Uso indicado apos o redirecionamento para evitar vazar dados criticos.
die();