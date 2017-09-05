 <!--
<link rel="stylesheet" href="../jqwidgets-ver4.5.0/jqwidgets/styles/jqx.base.css" type="text/css" />

<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxcore.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxscrollbar.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdata.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdata.export.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdatatable.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxdropdownlist.js"></script>
<script type="text/javascript" src="../jqwidgets-ver4.5.0/jqwidgets/jqxlistbox.js"></script>
 -->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cadastro de Clientes</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">

        <div id="listaCliente"></div>
        <div style='margin-top: 20px;'>
            <div style='float: left;'>
                <input type="button" value="Exportar para Excel" id='excelExport' />
                <input type="button" value="Exportar para PDF" id='pdfExport' />
            </div>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#excelExport").jqxButton();
        $("#pdfExport").jqxButton();
        $("#excelExport").click(function () {
            $("#listaCliente").jqxDataTable('exportData', 'xls');
        });
        $("#pdfExport").click(function () {
            $("#listaCliente").jqxDataTable('exportData', 'pdf');
        });
    });
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
    loadjscssfile('../js/jCliente.js?nocache=' + Math.random(), 'js');
</script>