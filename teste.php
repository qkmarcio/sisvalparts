<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
        <meta name="msapplication-tap-highlight" content="no" />
        <title id='Description'>Responsive DataGrid - Mobile Example
        </title>
        <!--<link rel="stylesheet" href="jqwidgets-ver4.5.0/styles/demos/jqwidgets/styles/demo.css" type="text/css" /> !-->

        <link rel="stylesheet" href="jqwidgets-ver4.5.0/jqwidgets/styles/jqx.base.css" type="text/css" />
        <link rel="stylesheet" href="jqwidgets-ver4.5.0/jqwidgets/styles/jqx.windowsphone.css" type="text/css" />
        <link rel="stylesheet" href="jqwidgets-ver4.5.0/jqwidgets/styles/jqx.blackberry.css" type="text/css" />
        <link rel="stylesheet" href="jqwidgets-ver4.5.0/jqwidgets/styles/jqx.mobile.css" type="text/css" />
        <link rel="stylesheet" href="jqwidgets-ver4.5.0/jqwidgets/styles/jqx.android.css" type="text/css" />


        <script type="text/javascript" src="jqwidgets-ver4.5.0/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxdata.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxgrid.selection.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxgrid.columnsresize.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/mobiledemos/simulator.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="jqwidgets-ver4.5.0/demos/jqxgrid/generatedata.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                // prepares the simulator. 
                var theme = prepareSimulator("grid");
                //var data = generatedata(500);
                /* var source =
                 {
                 localdata: data,
                 datatype: "array",
                 datafields:
                 [
                 {name: 'name', type: 'string'},
                 {name: 'firstname', type: 'string'},
                 {name: 'lastname', type: 'string'},
                 {name: 'productname', type: 'string'},
                 {name: 'available', type: 'bool'},
                 {name: 'quantity', type: 'number'},
                 {name: 'price', type: 'number'},
                 {name: 'date', type: 'date'}
                 ]
                 };*/
                var obj = new Object();
                obj.campo = "first 100 *";
                obj.where = "where disponivel='S' and ativo='N' order by descricao";
                var data = {'obj': obj, 'funcao': 'getListaProduto'};
                var source = {
                    type: "POST",
                    datatype: "json",
                    datafields: [
                        {name: "idproduto"},
                        {name: "codigo"},
                        {name: "descricaoBr"},
                        {name: "marca"},
                        {name: "venda"},
                        {name: "minimo"},
                        {name: "custo"},
                        {name: "estoque"},
                        {name: "v6meses"},
                        {name: "original"}

                    ],
                    id: 'id',
                    url: 'view/vProduto.php',
                    data: data
                };


                var dataAdapter = new $.jqx.dataAdapter(source);
                $("#grid").jqxGrid(
                        {
                            width: '100%',
                            height: '100%',
                            source: dataAdapter,
                            theme: theme,
                            columnsresize: true,
                            columnsheight: 40,
                            rowsheight: 70,
                            columns: [
                                {text: 'Product', dataField: 'descricaoBr', width: '40%'},
                                {text: 'Quantity', dataField: 'estoque', align: 'right', width: '30%', cellsalign: 'right'},
                                {text: 'Unit Price', dataField: 'venda', align: 'right', width: '30%', cellsalign: 'right', cellsformat: 'c2'}
                            ]
                        });
                initSimulator("grid");
            });
        </script>
    </head>
    <body class='default'>
        <div id="demoContainer" class="device-mobile-tablet">
            <div id="container" class="device-mobile-tablet-container">
                <div style="border-left: none; border-bottom: none; border-right: none;" id='grid'>
                </div>
            </div>
        </div>
    </body>
</html>