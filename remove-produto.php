<?php



require_once("banco-produto.php");

require_once("logica-usuario.php");

verificaUsuario();

$id = $_POST['id'];

removeProduto($conexao, $id);

$_SESSION["success"] = "Produto removido com sucesso.";

// Pagina que o browser deve redirecionar.
header("Location: produto-lista.php");

// Uso indicado apos o redirecionamento para evitar vazar dados criticos.
die();