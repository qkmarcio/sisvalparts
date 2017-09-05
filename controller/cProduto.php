<?php

Class cProduto {

    public function __construct() {
        
    }

    public function getAllProduto() {
        
        $obj = (object) $_REQUEST['obj'];
        
        $query = "SELECT $obj->campo FROM PRODUTO $obj->where";
        $c = new cConexao();

        $con = $c->conFirebird();

        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->idproduto = $obj->IDPRODUTO;
            $cls->posicao = $obj->POSICAO;
            $cls->codigo = $obj->FABRICANTE;
            $cls->original = $obj->ORIGINAL;
            $cls->descricaoBr = utf8_encode($obj->DESCRICAO);
            $cls->descricaoPy = utf8_encode($obj->DESCR02);
            $cls->descricaoCa = utf8_encode($obj->APLICACAO);
            $cls->marca = utf8_encode($obj->DESCRMARCA);
            $cls->venda = Formatador::convertFloatToGuarani($obj->VENDA_ATUAL);
            $cls->minimo = Formatador::convertFloatToGuarani($obj->PRECO_MINIMO);
            $cls->custo = Formatador::convertFloatToGuarani($obj->CUSTO_ANTERIOR);
            $cls->estoque = $obj->ESTOQUE_MENOS_SEP;
            $cls->v6meses = $obj->QTD_VENDIDA;
            
            $array[] = $cls;
        }
        return $array;
    }
    
    public function getAllProdutoCompra() {
        
        $obj = (object) $_REQUEST['obj'];
        
        $query = "SELECT "
                . "DESCRFORNEC,COMPRA,NUMNOTA,DATA,FABRICANTE,DESCPRODUTO,QTD,VALOR,TOTAL,MOEDA,OUTRO_CUSTO,"
                . "(select cambio from compra c where idcompra=compra)"
                . " FROM LIST_COMPRA"
                . " where produto=$obj->id AND"
                ." CANCELADA='F' AND TRANSFERENCIA IS NULL AND TIPO_CODVENDADEV IS NULL order BY DATA DESC";
        $c = new cConexao();

        $con = $c->conFirebird();

        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->data = Formatador::dateEmPortugues($obj->DATA);
            $cls->codigo = $obj->FABRICANTE;
            $cls->compra = $obj->COMPRA;
            $cls->nota = $obj->NUMNOTA;
            $cls->qtd = $obj->QTD;
            $cls->moeda = $obj->MOEDA;
            $cls->descricao = utf8_encode($obj->DESCPRODUTO);
            $cls->fornecedor = utf8_encode($obj->DESCRFORNEC);
            $cls->custo = utf8_encode($obj->OUTRO_CUSTO);
            
            $cls->valor = Formatador::convertFloatToMoeda($obj->VALOR);
            $cls->total = Formatador::convertFloatToMoeda($obj->TOTAL);
            $cls->cambio = Formatador::convertFloatToGuarani($obj->CAMBIO);
            
            $array[] = $cls;
        }
        return $array;
    }
}
?>
