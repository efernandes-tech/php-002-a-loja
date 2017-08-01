<?php

class Livro extends Produto {

    private $isbn;

    public function getIsbn() {
        return $this->isbn;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function calculaImposto() {
        return $this->preco * 0.065;
    }

}

// class/Livro.php