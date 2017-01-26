<?php
class Pessoa{
    private $nome;
    private $cidadeID;
    
    /**
     * construc method
     * @param string $nome Nome da pessoa
     * @param string $cidadeID ID da cidade
     */
    function __construct($nome, $cidadeID) {
        $this->nome = $nome;
        $this->cidadeID = $cidadeID;
    }
    
    /**
     * method __get
     * intercepta a obtenção de propriedades
     * @param $propriedade nome da propriedade
     */
    function __get($propriedade) {
        if($propriedade == 'cidade'){
            return new Cidade($this->cidadeID);
        }
    }
}

class Cidade{
    
    private $id;
    private $nome;
    
    /**
     * method construct
     * instacia o objeto
     * @param $id ID da cidade
     */
    function __construct($id) {
        $data[1] = "Porto alegre";
        $data[2] = "São Paulo";
        $data[3] = "Rio de Janeiro";
        $data[4] = "Salvador";
        
        // atribui o id
        $this->id = $id;
        
        //  define seu nome
        $this->setNome($data[$id]);
    }
    
    /**
     * method setNome
     * @param $nome nome da cidade
     */
    function setNome($nome){
        $this->nome = $nome;
    }
    
    /**
     * method getNome
     * @return String nome
     */
    function getNome(){
        return $this->nome;
    }
}

$maria = new Pessoa("Maria da Silva",1);
$pedro = new Pessoa("Pedro Rocha", 4);

echo $maria->cidade->getNome()."<br />";
echo $pedro->cidade->getNome()."<br />";

print_r($maria>cidade);
