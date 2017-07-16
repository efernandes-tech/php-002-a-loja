<?php

class ProdutoDao {

    private $conexao;

    function __construct($conexao){
        $this->conexao = $conexao;
    }

    function listaProdutos() {
        $produtos = array();

        $resultado = mysqli_query($this->conexao,
            "SELECT p.*, c.nome AS categoria_nome
            FROM produtos AS p
            JOIN categorias AS c ON p.categoria_id = c.id"
        );

        while($produto_array = mysqli_fetch_assoc($resultado)) {
            $nome = $produto_array["nome"];
            $descricao = $produto_array["descricao"];
            $preco = $produto_array["preco"];
            $usado = $produto_array["usado"];

            $categoria = new Categoria();
            $categoria->setNome($produto_array["categoria_nome"]);

            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
            $produto->setId($produto_array["id"]);

            // Funcao inseri no final do array.
            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function insereProduto(Produto $produto) {
        // Escapar caracteres especiais.
        // $produto->setNome(mysqli_real_escape_string($this->conexao, $produto->getNome()));
        // $produto->setPreco(mysqli_real_escape_string($this->conexao, $produto->getPreco()));
        // $produto->setDescricao(mysqli_real_escape_string($this->conexao, $produto->getDescricao()));
        // $produto->getCategoria()->setId(mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId()));
        // $produto->setUsado(mysqli_real_escape_string($this->conexao, $produto->isUsado()));

        // Interpolar string e variavel usando o { }.
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado) VALUES (
                '{$produto->getNome()}',
                '{$produto->getPreco()}',
                '{$produto->getDescricao()}',
                '{$produto->getCategoria()->getId()}',
                '{$produto->isUsado()}')";

        // echo $query;

        $resultadoDaInsercao = mysqli_query($this->conexao, $query);

        return $resultadoDaInsercao;
    }

    function alteraProduto(Produto $produto) {
        // Escapar caracteres especiais.
        // $produto->setId(mysqli_real_escape_string($this->conexao, $produto->getId()));
        // $produto->setNome(mysqli_real_escape_string($this->conexao, $produto->getNome()));
        // $produto->setPreco(mysqli_real_escape_string($this->conexao, $produto->getPreco()));
        // $produto->setDescricao(mysqli_real_escape_string($this->conexao, $produto->getDescricao()));
        // $produto->getCategoria()->setId(mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId()));
        // $produto->setUsado(mysqli_real_escape_string($this->conexao, $produto->isUsado()));

        $query = "UPDATE produtos SET
            nome = '{$produto->getNome()}',
            preco = {$produto->getPreco()},
            descricao = '{$produto->getDescricao()}',
            categoria_id = {$produto->getCategoria()->getId()},
            usado = {$produto->isUsado()}
            WHERE id = '{$produto->getId()}'";

        return mysqli_query($this->conexao, $query);
    }

    function removeProduto($id) {
        // Escapar caracteres especiais.
        $id = mysqli_real_escape_string($this->conexao, $id);

        $query = "DELETE FROM produtos WHERE id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    function buscaProduto($id) {
        // Escapar caracteres especiais.
        $id = mysqli_real_escape_string($this->conexao, $id);

        $query = "SELECT * FROM produtos WHERE id = {$id}";

        $resultado = mysqli_query($this->conexao, $query);

        $produto_buscado = mysqli_fetch_assoc($resultado);

        $nome = $produto_buscado["nome"];
        $preco = $produto_buscado["preco"];
        $descricao = $produto_buscado["descricao"];
        $usado = $produto_buscado["usado"];

        $categoria = new Categoria();
        $categoria->setId($produto_buscado["categoria_id"]);

        $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        $produto->setId($produto_buscado["id"]);

        return $produto;
    }

}