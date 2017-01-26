<?php

use \PDO;

class ProdutoGateWay {

    /**
     * method insert 
     * insere dados na tabela de Produtos
     * @param $id ID do produto
     * @param $descricao descricao do produto
     * @param estoque do produto
     * @param $precoCusto preco de custo
     */
    function insert($id, $descricao, $estoque, $precoCusto) {
        //cria a instrucao SQL
        $sql = "INSERT INTO produtos (id, descricao, estoque, precoCusto)" .
                " VALUES('$id','$descricao', '$estoque', '$precoCusto')";
        //instancia objeto PDO

        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        // executa a instrucao SQL
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * method update
     * altera os dados na tabela de Produtos
     * @param $id ID do produto
     * @param $descricao descricao do produto
     * @param estoque do produto
     * @param $precoCusto preco de custo
     */
    function update($id, $descricao, $estoque, $precoCusto) {
        //cria instrucao SQL de UPDATE
        $sql = "UPDATE produtos set descricao = '$descricao',"
                . "estoque = '$estoque',precoCusto = '$precoCusto'"
                . "WHERE id = '$id'";

        //instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * method delete
     * deleta um registro na tabela de produtos
     * @param $id ID do produto
     */
    function delete($id) {
        //cria instrucao SQL DELETE
        $sql = "DELETE FROM produtos WHERE id='$id'";

        //instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * method getObject
     * busca um registro da tabela
     * @param $id ID do produto
     */
    function getObject($id) {
        //cria instrucao SQL de SELECT
        $sql = "SELECT * FROM produtos WHERE id='$id'";

        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        //executa instrucao sql
        $result = $conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }
    
    /**
     * method getObject
     * Busca todos os registros da tabela
     */
    function getObjects() {
        //cria instrucao SQL de SELECT
        $sql = "SELECT * FROM produtos";

        // instancia objeto PDO
        $conn = new PDO('sqlite:produtos.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        //executa instrucao sql
        $result = $conn->query($sql);
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        unset($conn);
        return $data;
    }

}

//instancia objeto ProdutoGateway
$gateway = new ProdutoGateWay();

// insere alguns registros na tabela
$gateway->insert(1,'Salame',10,10);
$gateway->insert(2,'Batata',20,20);
$gateway->insert(3,'Chocolate',100,100);

// efetua algumas alteracoes
$gateway->update(1, 'Salame de boi', 5, 100);
$gateway->update(3, 'Chocolate suico', 100,1100 );

echo "Lista todos os produtos<br/>";
print_r($gateway->getObjects());
