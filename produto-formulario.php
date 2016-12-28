<?php

include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");

include("logica-usuario.php");

verificaUsuario();

$categorias = listaCategorias($conexao);



$produto = array("nome" => "", "descricao" => "", "preco" => "", "categoria_id" => "1");

$usado = "";

?>

<h1>Formulário de cadastro</h1>

<form action="adiciona-produto.php" method="post">

    <table>
        <?php include("produto-formulario-base.php"); ?>
        <tr>
            <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
        </tr>
    </table>
</form>

<?php include("rodape.php"); ?>