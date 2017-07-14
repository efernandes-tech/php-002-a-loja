<?php

class Produto {

    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
    public $usado;

    /**
     * @param float $valor 0.1 é o percentual padrão.
     */
    public function precoComDesconto($valor = 0.1) {
        $this->preco -= $this->preco * $valor;

        return $this->preco;
    }

}

// arquivo class/Produto.php