<?php

Class cCliente {

    public function __construct() {
        
    }

    public function getAllCliente() {
        
        $obj = (object) $_REQUEST['obj'];
        
        $query = "SELECT * FROM CLIENTE";
        $c = new cConexao();

        $con = $c->conFirebird();

        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->idcliente = $obj->IDCLIENTE;
            $cls->tipo = $obj->TIPO;
            $cls->cliente = utf8_encode($obj->NOME);
            $cls->fantasia = utf8_encode($obj->NOME_FANT);
            $cls->credito = $obj->CREDITO;
            
            $array[] = $cls;
        }
        return $array;
    }
}
?>
