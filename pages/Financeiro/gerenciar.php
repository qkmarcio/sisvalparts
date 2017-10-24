<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Gerenciar</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div id="gerencial01" class="col-lg-4">
            <div style='height: 30px;'>
                <div style='float: left;margin-top: 5px;'>
                    <input type="button" value="Exp Excel" id='excelExport' />
                </div>
            </div>
            <div id="listaGerecial"></div>
        </div>
        <div id="gerencial02" class="col-lg-4">
            <div style='height: 30px;'>
                <div style='float: left;margin-top: 5px;'>
                    <div id="vendaInicio" style="float: left"></div>
                    <input type="button" value="Exp Excel" id='excelExport1' />
                </div>
            </div>
            <div id="listaVentaPorVendedor"></div>
        </div>
        <div id="gerencial03" class="col-lg-4">
            <div style='height: 30px;'>
                <div style='float: left;margin-top: 5px;'>
                    <div id="clienteInicio" style="float: left"></div>
                    <input type="button" value="Exp Excel" id='excelExport2' />
                </div>
            </div>
            <div id="listaVentaPorCliente"></div>
        </div>
    </div>

    <!-- /.col-lg-12 -->
</div>
<div class="row">

</div>
<!-- /.row -->
<script type="text/javascript">
//    $(document).ready(function () {
////        $("#excelExport,#excelExport1,#excelExport2").jqxButton();
////        $("#excelExport").click(function () {
////            $("#listaGerecial").jqxDataTable('exportData', 'xls');
////        });
////        $("#excelExport1").click(function () {
////            $("#listaVentaPorVendedor").jqxDataTable('exportData', 'xls');
////        });
////        $("#excelExport2").click(function () {
////            $("#listaVentaPorCliente").jqxDataTable('exportData', 'xls');
////        });
////        $("#vendaInicio,#clienteInicio").jqxDateTimeInput({width: 190, height: 25, selectionMode: 'range'});
//    });
    function loadjscssfile(filename, filetype) {
        var fileref = null;
        if (filetype == "js") { //if filename is a external JavaScript file
            fileref = document.createElement('script');
            fileref.setAttribute("type", "text/javascript");
            fileref.setAttribute("src", filename);
        } else if (filetype == "css") { //if filename is an external CSS file
            fileref = document.createElement("link");
            fileref.setAttribute("rel", "stylesheet");
            fileref.setAttribute("type", "text/css");
            fileref.setAttribute("href", filename);
        }
        if (typeof fileref != "undefined") {
            document.getElementsByTagName("head")[0].appendChild(fileref);
        }
    }
    loadjscssfile('../js/custom_jquery.js?nocache=' + Math.random(), 'js');
    loadjscssfile('../js/jGerenciar.js?nocache=' + Math.random(), 'js');
</script>

