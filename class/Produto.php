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
        return $this->preco - ($this->preco * $valor);
    }

}

// arquivo class/Produto.php