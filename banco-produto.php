<?php

require_once("conecta.php");

require_once("class/Produto.php");

require_once("class/Categoria.php");

function listaProdutos($conexao) {
    $produtos = array();

    $resultado = mysqli_query($conexao, "SELECT p.*, c.nome AS categoria_nome
        FROM produtos AS p JOIN categorias AS c ON p.categoria_id = c.id");

    while($produto_array = mysqli_fetch_assoc($resultado)) {
        $categoria = new Categoria();
        $categoria->nome = $produto_array["categoria_nome"];

        $produto = new Produto();
        $produto->id = $produto_array["id"];
        $produto->nome = $produto_array["nome"];
        $produto->descricao = $produto_array["descricao"];
        $produto->preco = $produto_array["preco"];
        $produto->usado = $produto_array["usado"];
        $produto->categoria = $categoria;

        // Funcao inseri no final do array.
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, Produto $produto) {
    // Escapar caracteres especiais.
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->preco = mysqli_real_escape_string($conexao, $produto->preco);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $produto->categoria->id = mysqli_real_escape_string($conexao, $produto->categoria->id);
    $produto->usado = mysqli_real_escape_string($conexao, $produto->usado);

    // Interpolar string e variavel usando o { }.
    $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado)
        VALUES ('{$produto->nome}', '{$produto->preco}', '{$produto->descricao}',
            '{$produto->categoria->id}', '{$produto->usado}')";

    // echo $query;

    $resultadoDaInsercao = mysqli_query($conexao, $query);

    return $resultadoDaInsercao;
}

function alteraProduto($conexao, Produto $produto) {
    // Escapar caracteres especiais.
    $produto->id = mysqli_real_escape_string($conexao, $produto->id);
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->preco = mysqli_real_escape_string($conexao, $produto->preco);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $produto->categoria->id = mysqli_real_escape_string($conexao, $produto->categoria->id);
    $produto->usado = mysqli_real_escape_string($conexao, $produto->usado);

    $query = "UPDATE produtos SET nome = '{$produto->nome}', preco = {$produto->preco},
        descricao = '{$produto->descricao}', categoria_id= {$produto->categoria->id},
            usado = {$produto->usado} WHERE id = '{$produto->id}'";

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

    $produto_buscado = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->id = $produto_buscado["categoria_id"];

    $produto = new Produto();
    $produto->id = $produto_buscado["id"];
    $produto->nome = $produto_buscado["nome"];
    $produto->descricao = $produto_buscado["descricao"];
    $produto->preco = $produto_buscado["preco"];
    $produto->usado = $produto_buscado["usado"];
    $produto->categoria = $categoria;

    return $produto;
}