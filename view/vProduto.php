<?php

include_once '../controller/cConexao.php';
include_once '../controller/cProduto.php';
include_once '../lib/Formatador.php';

//$c = new cConexao();                                                          //CONTROLLER PARA CONEXAO DO BANCO
$funcao = $_REQUEST['funcao'];                                              //RECEBE O NOME DA FUNÇÃO
call_user_func($funcao);


function getListaProduto() {                                                   //FUNÇÃO PARA PEGAR O REMETENTE
    $obj = (object) $_REQUEST['obj'];                                         //RECEBE O OBJETO DO AJAX
    $col = new cProduto();                                                  //CHAMA A CONTROLLER
    $arrObj = $col->getAllProduto();                                        //BUSCA NA TAB_EXPORTADOR PELO NOME
    
    echo json_encode($arrObj);                                                  //RETORNA O ARRAY COM OS OBJETOS DO BANCO
}

function getListaProdutoCompra() {                                                   //FUNÇÃO PARA PEGAR O REMETENTE
    $obj = (object) $_REQUEST['obj'];                                         //RECEBE O OBJETO DO AJAX
    $col = new cProduto();                                                  //CHAMA A CONTROLLER
    $arrObj = $col->getAllProdutoCompra();                                        //BUSCA NA TAB_EXPORTADOR PELO NOME
    
    echo json_encode($arrObj);                                                  //RETORNA O ARRAY COM OS OBJETOS DO BANCO
}


?>
