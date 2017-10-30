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
            $cod = $linha->getElementsByTagName("Data")->item(0)->nodeValue;// coluna B cod interno
            $qtd = $linha->getElementsByTagName("Data")->item(1)->nodeValue; //coluna A quantidade
            $provedor = $linha->getElementsByTagName("Data")->item(4)->nodeValue; //coluna G Cod Fabricante
            $marca = $linha->getElementsByTagName("Data")->item(5)->nodeValue; //coluna D Provedor
            
            //inserirDados($nome, $email);
            $o =getPosicao($cod);
            
            
            $posicao = ( $o->posicao === null ? "Sem Lugar " : $o->posicao);
            $id = ( $o->idproduto===null ? "vazio" : $o->idproduto);
            $qtd1 = ( $qtd===null ? "vazio" : $qtd);
            $cod1 = ( $cod===null ? "vazio" : $cod);
            $marca1 = ( $marca===null ? "vazio" : $marca);
            $provedor1 = ( $provedor===null ? "vazio" : $provedor);
            
            $cls->qtd = $qtd1;
            $cls->cod= $cod1;
            $cls->posicao = $posicao;
            $cls->marca=$marca1;
            $cls->idcod=$id;
            $cls->provedor=$provedor1;
            $array[]= $cls;
        }
        $contLinha++;
    }
    echo json_encode($array);
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