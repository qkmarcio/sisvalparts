var fornecedor = {};

fornecedor.start = function () {
    fornecedor.lista();
};
fornecedor.lista = function () {
   // $("#TchequeVGuarani,#TchequeVReal,#TchequeVDolar").html('0');

    //var dia = gerenciar.data();
    var obj = new Object();
        obj.campo = "";
    var data = {'obj': obj, 'funcao': 'getListaFornecedor'};
    var source = {type: "POST", datatype: "json", datafields: [
                {name: "idfornecedor"}, 
                {name: "fornecedor"}, 
                {name: "fantasia"}
            ],
        id: 'id',
        url: '../view/vFornecedor.php',
        data: data};

    var dataAdapter = new $.jqx.dataAdapter(source); // VAR DE RETORNO
    
    $("#listaFornecedor").jqxDataTable({
        width: '100%',
        height: 500,
        filterable: true,
        source: dataAdapter,
        altRows: true,
        sortable: true,
        pageSize: 15,
        pageable: true,
        pagerButtonsCount: 10,
        exportSettings: {
        fileName: "Lista de Fornecedor"
    },
        columns: [
            {text: 'Codigo', datafield: 'idfornecedor', width: 100},
            {text: 'Nome', datafield: 'fornecedor', width: 300},
            {text: 'Nome Fantasia', datafield: 'fantasia', width: 300},
            
        ]
    });

};
fornecedor.start();