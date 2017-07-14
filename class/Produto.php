<?php

class Produto {

    private $id;
    private $nome;
    private $preco;
    private $descricao;
    private $categoria;
    private $usado;

    /**
     * @param float $valor 0.1 é o percentual padrão.
     */
    public function precoComDesconto($valor = 0.1) {
        if ($valor > 0 && $valor <= 0.5)
            return $this->preco - ($this->preco * $valor);
        else
            return $this->preco;
    }

}

// arquivo class/Produto.php