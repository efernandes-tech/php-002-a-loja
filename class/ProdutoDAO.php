<?php

class produtoDAO {

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
            $tipoProduto = $produto_array['tipoProduto'];
            $produto_id = $produto_array['id'];
            $categoria_nome = $produto_array['categoria_nome'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipoProduto, $produto_array);
            $produto->atualizaBaseadoEm($produto_array);

            $produto->setId($produto_id);
            $produto->getCategoria()->setNome($categoria_nome);

            // Funcao inseri no final do array.
            array_push($produtos, $produto);
        }

        return $produtos;
    }

    function insereProduto(Produto $produto) {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "";
        if($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $tipoProduto = get_class($produto);
        // Escapar caracteres especiais.
        // $produto->setNome(mysqli_real_escape_string($this->conexao, $produto->getNome()));
        // $produto->setPreco(mysqli_real_escape_string($this->conexao, $produto->getPreco()));
        // $produto->setDescricao(mysqli_real_escape_string($this->conexao, $produto->getDescricao()));
        // $produto->getCategoria()->setId(mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId()));
        // $produto->setUsado(mysqli_real_escape_string($this->conexao, $produto->isUsado()));

        // Interpolar string e variavel usando o { }.
        $query = "INSERT INTO produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto, waterMark, taxaImpressao) VALUES (
                '{$produto->getNome()}',
                '{$produto->getPreco()}',
                '{$produto->getDescricao()}',
                '{$produto->getCategoria()->getId()}',
                '{$produto->isUsado()}',
                '{$isbn}',
                '{$tipoProduto}',
                '{$waterMark}',
                '{$taxaImpressao}')";

        // echo $query;

        $resultadoDaInsercao = mysqli_query($this->conexao, $query);

        return $resultadoDaInsercao;
    }

    function alteraProduto(Produto $produto) {
        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = $produto->getIsbn();
        }

        $waterMark = "";
        if($produto->temWaterMark()) {
            $waterMark = $produto->getWaterMark();
        }

        $taxaImpressao = "";
        if($produto->temTaxaImpressao()) {
            $taxaImpressao = $produto->getTaxaImpressao();
        }

        $tipoProduto = get_class($produto);
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
            usado = {$produto->isUsado()},
            isbn = '{$isbn}',
            tipoProduto = '{$tipoProduto}',
            waterMark = '{$waterMark}',
            taxaImpressao = '{$taxaImpressao}'
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

        $tipoProduto = $produto_buscado['tipoProduto'];
        $produto_id = $produto_buscado['id'];
        $categoria_id = $produto_buscado['categoria_id'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipoProduto, $produto_buscado);
        $produto->atualizaBaseadoEm($produto_buscado);

        $produto->setId($produto_id);
        $produto->getCategoria()->setId($categoria_id);

        return $produto;
    }

}

// class/produtoDAO.php