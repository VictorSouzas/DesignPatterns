<?php
final class Produto{
    static $recordset= array();
    
    /**
     * metodo adicionar
     * adiciona um produto ao registro
     * @param $descricao descricao do produto
     * @param $estoque estoque atual do produto
     * @param $precoCusto preco de custo do produto
     */
    public function adicionar($id,$descricao,$estoque,$precoCusto){
        //self:: chama itens staticos dentro da classe
        self::$recordset[$id]['descricao'] = $descricao;
        self::$recordset[$id]['estoque'] = $estoque;
        self::$recordset[$id]['precoCusto'] = $precoCusto;
    }
    
    /**
     * method registraCompra
     * registra uma compra, atualiza custo e incrementa o estoque atual do produto
     * @param $unidades unidades adiquiridas
     * @param $precoCusto novo preco de custo
     */
    public function registraCompra($id,$unidades,$precoCusto){
        self::$recordset[$id]['estoque'] += $unidades;
        self::$recordset[$id]['precoCusto'] = $precoCusto;
    }
    
    /**
     * metodo registraVenda
     * registra uma venda e decrementa o estoque
     * @param $unidades unidades vendidas
     */
    public function registraVenda($id,$unidades){
        self::$recordset[$id]['estoque'] -= $unidades;
    }
    
    /**
     * metodo getEstoque
     * @return a quantidade em estoque
     */
    public function getEstoque($id){
        return self::$recordset[$id]['estoque'];
    }
    
    /**
     * metodo calculaPrecoVenda
     * @return retorna o preco de venda, baseadi numa margem de lucro de 30% sobre o custo
     */
    public function calculaPrecoVenda($id){
        return self::$recordset[$id]['precoCusto'] * 1.3;
    }
}

$produto = new Produto();

$produto->adicionar(1, 'ps1', 300, 500);
$produto->adicionar(2, 'notebook', 50, 2500);

echo "estoques:<br />";
echo $produto->getEstoque(1)."<br />";
echo $produto->getEstoque(2)."<br />";

echo 'Preco de venda:<br />';
echo $produto->calculaPrecoVenda(1)."<br />";
echo $produto->calculaPrecoVenda(2)."<br />";

echo $produto->registraVenda(1, 100);
echo $produto->registraVenda(2, 5);

echo $produto->registraCompra(1, 1000, 250);
echo $produto->registraCompra(2, 2000, 4500);

echo 'Preco de venda:<br />';
echo $produto->calculaPrecoVenda(1)."<br />";
echo $produto->calculaPrecoVenda(2)."<br />";