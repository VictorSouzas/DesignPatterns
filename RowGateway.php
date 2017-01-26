<?php

class ProdutoGateway {

    private $data;

    function __get($prop) {
        return $this->data[$prop];
    }

    function __set($name, $value) {
        $this->data[$name] = $value;
    }

    /**
     * method insert
     * armazena o objeto na tabela de produto
     */
    function insert() {
        // cria uma instrucao SQL INSERT
        $sql = "INSERT INTO produtos(id, descricao, estoque, precoCusto)"
                . " VALUES('{$this->id}', '{$this->descricao}','{$this->estoque}','{$this->precoCusto}')";
        echo $sql . "<br />";
        // instancia o objeto PDO
        $conn = new PDO('sqlite3:produtos.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $conn->exec($sql);
        unset($conn);
    }

    /**
     * method update
     * altera os dados na tabela produtos
     */
    function update() {
        //cria instrucao SQL update
        $sql = "UPDATE produtos set "
                . " descricao = '{$this->descricao}',"
                . " estoque = '{$this->estoque}',"
                . " = '{$this->precoCusto}' "
                . " WHERE id = '{$this->id}'";
        
                
    }

}
