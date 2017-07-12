<?php

require_once("cabecalho.php");

require_once("banco-categoria.php");

require_once("logica-usuario.php");

verificaUsuario();

$categorias = listaCategorias($conexao);



$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria_id" => "1");

$usado = "";

?>

<h1>Formulário de cadastro</h1>

<form action="adiciona-produto.php" method="post">

    <table class="table">
        <?php require_once("produto-formulario-base.php"); ?>
        <tr>
            <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>