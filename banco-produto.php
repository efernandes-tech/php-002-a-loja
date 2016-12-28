<?php

require_once("conecta.php");

function listaProdutos($conexao) {
    $produtos = array();

    $resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

    while($produto = mysqli_fetch_assoc($resultado)) {
        // Funcao inseri no final do array.
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    // Escapar caracteres especiais.
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $categoria_id);
    $usado = mysqli_real_escape_string($conexao, $usado);

    // Interpolar string e variavel usando o { }.
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES ('{$nome}', '{$preco}', '{$descricao}', '{$categoria_id}', '{$usado}')";

    // echo $query;

    $resultadoDaInsercao = mysqli_query($conexao, $query);

    return $resultadoDaInsercao;
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    // Escapar caracteres especiais.
    $id = mysqli_real_escape_string($conexao, $id);
    $nome = mysqli_real_escape_string($conexao, $nome);
    $preco = mysqli_real_escape_string($conexao, $preco);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $categoria_id = mysqli_real_escape_string($conexao, $categoria_id);
    $usado = mysqli_real_escape_string($conexao, $usado);

    $query = "UPDATE produtos SET nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} WHERE id = '{$id}'";

    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    // Escapar caracteres especiais.
    $id = mysqli_real_escape_string($conexao, $id);

    $query = "DELETE FROM produtos WHERE id = {$id}";

    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    // Escapar caracteres especiais.
    $id = mysqli_real_escape_string($conexao, $id);

    $query = "SELECT * FROM produtos WHERE id = {$id}";

    $resultado = mysqli_query($conexao, $query);

    return mysqli_fetch_assoc($resultado);
}