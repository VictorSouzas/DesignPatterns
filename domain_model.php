<?php

final class Produto {

    private $descricao;
    private $estoque;
    private $preco_custo;

    /**
     * method construct
     * define valores iniciais
     * @param $descricao descricao do produto
     * @param $estoque estoque do produto
     * @param $preco_custo custo do produto
     */
    function __construct($descricao, $estoque, $preco_custo) {
        $this->descricao = $descricao;
        $this->estoque = $estoque;
        $this->preco_custo = $preco_custo;
    }

    /**
     * registra uma compra, atualiza custo e incrementa o estoque atual
     * @param $unidades
     * @param $preco_custo
     */
    public function registraCompra($unidades, $preco_custo) {
        $this->preco_custo = $preco_custo;
        $this->estoque += $unidades;
    }

    /**
     * method registraVenda
     * registra venda e decrementa o estoque
     * @param type $unidades
     */
    public function registraVenda($unidades) {
        $this->estoque -= $unidades;
    }

    /**
     * @return estoque
     */
    public function getEstoque() {
        return $this->estoque;
    }

    /**
     * @return preco de venda
     */
    public function calculaPrecoVenda() {
        return $this->preco_custo * 1.3;
    }

}

final class Venda {

    private $itens;

    /**
     * adiciona um item na venda
     * @param type $quantidade
     * @param Produto $produto
     */
    public function addItens($quantidade, Produto $produto) {
        $this->itens[] = array($quantidade, $produto);
    }

    /**
     * method getItens
     * @return array de produtos
     */
    public function getItens() {
        return $this->itens;
    }

    public function finalizaVenda() {

        $total = 0;

        foreach ($this->getItens() as $itemVenda) {
            $quantidade = $itemVenda[0];
            $produto = $itemVenda[1];

            $total += $produto->calculaPrecoVenda() * $quantidade;
            $produto->registraVenda($quantidade);
        }
        return $total;
    }

}

$venda = new Venda();

$venda->addItens(3, new Produto('Vinho', 10, 15));
$venda->addItens(5, new Produto("Shuriken", 50, 5));
$venda->addItens(8, new Produto("Ninjutsu", 3000, 500));

echo $venda->finalizaVenda();