<div class="row col-sm-7"><!-- Container -->
    <div class="row"><!-- titulo -->
        <h1 class="page-header">Gerar Localização</h1>
    </div>
    <div class="row">
        <div id="jqxFileUpload"></div>
        <div id="log" style="margin-top: 20px"></div>
    </div>
    <div class="row" id="menu" style="display: none;"><!-- menu -->
        <div class="col-sm-8">
            <button type="button" class="btn btn-danger" id='excelExport' >Exp Excel</button>
        </div>
    </div>
    <div class="row">
        <div id="lista"></div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#excelExport").click(function () {
            $("#lista").jqxGrid('exportData', 'xls', 'Localização');
        });


        $('#jqxFileUpload').jqxFileUpload({
            browseTemplate: 'success',
            uploadTemplate: 'primary',
            cancelTemplate: 'danger',
            width: 300,
            uploadUrl: '../view/upload.php',
            fileInputName: 'fileInput'
        });

        $('#jqxFileUpload').on('uploadEnd', function (event) {

            $('#menu').show();
            var args = event.args;

            var fileName = args.file;
            var data = args.response;

            var source =
                    {
                        localdata: data,
                        datafields: [
                            {name: 'qtd', type: 'number'},
                            {name: 'cod', type: 'string'},
                            {name: 'posicao', type: 'string'},
                            {name: 'marca', type: 'string'},
                            {name: 'idcod', type: 'number'},
                            {name: 'provedor', type: 'string'},
                            {name: 'multiplo', type: 'number'},
                            {name: 'estoque', type: 'number'}
                        ],
                        datatype: "json"
                    };
            var dataAdapter = new $.jqx.dataAdapter(source); // VAR DE RETORNO

            $("#lista").jqxGrid({
                width: 600,
                height: 500,
                rowsheight: 70,
                source: dataAdapter,
                columns: [
                    {text: 'Codigo', datafield: 'cod', width: 100},
                    {text: 'Qtd', datafield: 'qtd', width: 100},
                    {text: 'Lugar', datafield: 'posicao', width: 200},
                    {text: 'Cod Provedor', datafield: 'provedor', width: 150},
                    {text: 'Marca', datafield: 'marca', width: 150},
                    {text: 'Pacote', datafield: 'multiplo', width: 150},
                    {text: 'Estoque', datafield: 'estoque', width: 150}

                ]
            });

        });
    });
</script>


