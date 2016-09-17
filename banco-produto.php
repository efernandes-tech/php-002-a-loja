<?php
function listaProdutos($conexao) {
    $produtos = array();

    $resultado = mysqli_query($conexao, "SELECT * FROM produtos");

    while($produto = mysqli_fetch_assoc($resultado)) {
    	// Funcao inseri no final do array.
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao) {
	// Interpolar string e variavel usando o { }.
    $query = "INSERT INTO produtos (nome, preco, descricao) VALUES ('{$nome}', '{$preco}', '{$descricao}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);

    return $resultadoDaInsercao;
}

function removeProduto($conexao, $id) {
    $query = "DELETE FROM produtos WHERE id = {$id}";

    return mysqli_query($conexao, $query);
}