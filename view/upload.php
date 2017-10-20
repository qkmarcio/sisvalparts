<?php
   include '../controller/cConexao.php';

if (!empty($_FILES['fileInput']['tmp_name'])) {
    $arquivo = new DOMDocument;
    $arquivo->load($_FILES['fileInput']['tmp_name']);

    $linhas = $arquivo->getElementsByTagName("Row");

    $contLinha = 1;
    foreach ($linhas as $linha) {
        $cls= new stdClass();
        if ($contLinha > 1) {
            @$qtd = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
            @$cod = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
            @$marca = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
            //inserirDados($nome, $email);
            $o =getPosicao($cod);
            
            
            $posicao = ( $o->posicao==null ? "Manuel VIADO " : $o->posicao);
            $id = ( $o->idproduto==null ? "error" : $o->idproduto);
            /*echo $qtd.'------';
            echo $cod.'------';
            echo $f.'------';
            echo $marca;
            echo '</br>';*/
            $cls->qtd = $qtd;
            $cls->cod= $cod;
            $cls->posicao = $posicao;
            $cls->marca=$marca;
            $cls->idcod=$id;
            $array[]= $cls;
        }
        $contLinha++;
    }
    echo json_encode($array);
    //var_dump($array);
}

function getPosicao($o) {

    $query = "SELECT IDPRODUTO, POSICAO FROM PRODUTO WHERE FABRICANTE='$o'";

    $c = new cConexao();
    $con = $c->conFirebird();
    $result = ibase_query($con, $query) or die(ibase_errmsg() . "<br>sql utilizado: " . $query);
    while ($obj = ibase_fetch_object($result)) {
        $cls = new stdClass();

        $cls->posicao = $obj->POSICAO;
        $cls->idproduto = $obj->IDPRODUTO;
    }
    return @$cls;
}