<?php
function listaProdutos($conexao) {
    $produtos = array();

    $resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

    while($produto = mysqli_fetch_assoc($resultado)) {
        // Funcao inseri no final do array.
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id) {
    // Interpolar string e variavel usando o { }.
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id) VALUES ('{$nome}', '{$preco}', '{$descricao}', '{$categoria_id}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);

    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id) {
    $query = "DELETE FROM produtos WHERE id = {$id}";

    return mysqli_query($conexao, $query);
}