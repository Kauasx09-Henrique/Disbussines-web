<?php

class ProdutoDTO {

    private $id_produto;      // ID do produto (adicionado para compatibilidade)
    private $nome_produto;    // Nome do produto
    private $valor_produto;   // Valor do produto
    private $desc_produto;    // Descrição do produto
    private $imagem_produto;  // Caminho da imagem do produto

    // Setter e Getter para id_produto
    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }
    public function getIdProduto() {
        return $this->id_produto;
    }

    // Setter e Getter para nome_produto
    public function setNomeProduto($nome_produto) {
        $this->nome_produto = $nome_produto;
    }
    public function getNomeProduto() {
        return $this->nome_produto;
    }

    // Setter e Getter para valor_produto
    public function setValorProduto($valor_produto) {
        $this->valor_produto = $valor_produto;
    }
    public function getValorProduto() {
        return $this->valor_produto;
    }

    // Setter e Getter para desc_produto
    public function setDescProduto($desc_produto) {
        $this->desc_produto = $desc_produto;
    }
    public function getDescProduto() {
        return $this->desc_produto;
    }

    // Setter e Getter para imagem_produto
    public function setImagemProduto($imagem_produto) {
        $this->imagem_produto = $imagem_produto;
    }
    public function getImagemProduto() {
        return $this->imagem_produto;
    }

}

?>
