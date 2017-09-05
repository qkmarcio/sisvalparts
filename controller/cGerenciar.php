<?php

Class cGerenciar {

    public function __construct() {
        
    }

    public function getAllCheques($o) {


        //$obj = (object) $_REQUEST['obj'];

        $query = "SELECT $o->campo FROM CHEQUE WHERE ENTRADA_SAIDA='E' AND FATURADA='A' AND CANCELADO IS NULL AND $o->campo2";
        $c = new cConexao();

        $con = $c->conFirebird();

        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);

        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->grupo = $o->campo4;
            $cls->tipo = $o->campo3;
            $cls->valorGS = $obj->MOEDA == 'G' ? $obj->VALOR_TOTAL : '0';
            $cls->valorRS = $obj->MOEDA == 'R' ? $obj->VALOR_TOTAL : '0';
            $cls->valorUS = $obj->MOEDA == 'D' ? $obj->VALOR_TOTAL : '0';

            $array[] = $cls;
        }
        return $array;
    }

    public function getAllContaCobrar($o) {

        $query = "SELECT $o->campo FROM RECEBER WHERE STATUS='A' AND $o->campo2";

        $c = new cConexao();
        $con = $c->conFirebird();
        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->grupo = $o->campo4;
            $cls->tipo = $o->campo3;
            $cls->valorGS = $obj->VALOR_TOTAL;
            $cls->valorRS = '0';
            $cls->valorUS = '0';

            $array[] = $cls;
        }
        return $array;
    }

    public function getAllVenda($o) {
        $query = "select $o->campo FROM VENDA V WHERE $o->campo2";
        $c = new cConexao();
        $con = $c->conFirebird();
        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();
            $cls->grupo = $o->campo4;
            $cls->tipo = $o->campo3;
            $cls->valorGS = $obj->VALOR_TOTAL;
            $cls->valorRS = '0';
            $cls->valorUS = '0';
            $array[] = $cls;
        }
        return $array;
    }

    public function getConsultaVendaPeriodo($o) {
        $query = "SELECT
                    ROUND(SUM(v.total),0) AS t_valor,
                    ROUND(SUM(v.custo_total),0) AS t_custo,
                    ROUND(SUM(v.total-v.custo_total)/SUM(v.total)*100,0) AS t_margen,
                    $o->campo
                FROM venda v WHERE
                    v.faturada='F' AND v.cancelada IS NULL AND
                    v.data_boleta BETWEEN $o->data
                GROUP BY $o->group";
        $c = new cConexao();
        $con = $c->conFirebird();
        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();
            $cls->id = $obj->ID;
            $cls->nome = utf8_encode($obj->NOME);
            $cls->t_valor = $obj->T_VALOR;
            $cls->t_custo = $obj->T_CUSTO;
            $cls->devolucao = @$obj->DEVOLUCAO;
            $cls->t_margen = Formatador::zeroEsquerda(ceil($obj->T_MARGEN), 2);
            $array[] = $cls; // cada objeto téra o total, onde for usar o total basta pegar qualquer objeto(primeiro por exemplo)
        }
        return $array;
    }

    public function getConsultaDevolucao($data, $id) {

        $query = "SELECT SUM(c.SUBTOTAL) as DEV FROM COMPRA c WHERE c.FATURADA='F' AND c.CODVENDADEV IS NOT NULL AND c.CANCELADA IS NULL AND c.DATA_NOTA BETWEEN $data AND c.IDFUNC=$id";

        $c = new cConexao();
        $con = $c->conFirebird();

        $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);


        while ($obj = ibase_fetch_object($result)) {
            $cls = new stdClass();

            $cls->t_valor = $obj->DEV;

            $array[] = $cls; // cada objeto téra o total, onde for usar o total basta pegar qualquer objeto(primeiro por exemplo)
        }
        return $array;
    }

}

?>