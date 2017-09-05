

<div class="row">
    <div class="col-lg-8">
        <h1 class="page-header">Cadastro de Produtos</h1>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div style='float: left;'>
            <input type="button" value="Exportar para Excel" id='excelExport' />
            <input type="button" value="Exportar para PDF" id='pdfExport' />
        </div>
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
        <input type="text" id="buscaProduto" style="margin-right: 15px;float: left;text-transform: uppercase"/>
        <div id="listaProduto"></div>
        <div id="historicoCompra"></div>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <img id="imgProduto" style="margin-top: 8px" height="250" width="300" src="../Fotos/error.jpg"/>
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#buscaProduto').focus();
        $("#excelExport").jqxButton();
        $("#pdfExport").jqxButton();
        $("#excelExport").click(function () {
            $("#listaProduto").jqxGrid('exportData', 'xls', 'lista_Produto');
        });
        $("#pdfExport").click(function () {
            $("#listaProduto").jqxGrid('exportData', 'pdf');
        });

$('#buscaProduto').keypress(function() {
   // $(this).keypress()
 console.info($(this).val());;
});

$('buscaProduto').keyup( function() {
    //alert( $(this).find(":selected").val() );
    console.info('teste');
    
    console.info($(this).val());
});

        $('#buscaProduto').on('keypress', function (e) {
            //console.info($('#buscaProduto').val());

            var v = $('#buscaProduto').val().toUpperCase();

            if (e.keyCode == 13) {
                produto.buscaProduto(v);
            }

        });
        document.querySelector('body').addEventListener('keydown', function (event) {

            var tecla = event.keyCode;
            //console.info(tecla);

            if (tecla == 13) {

                // tecla ENTER

            } else if (tecla == 27) {
                $("#buscaProduto").val('');
                $('#buscaProduto').focus();

            } else if (tecla == 37) {

                // seta pra ESQUERDA

            } else if (tecla == 38) {

                // seta pra CIMA

            } else if (tecla == 39) {

                // seta pra DIREITA

            } else if (tecla == 40) {
                var id = $("#listaProduto").jqxGrid('getselectedrowindex');
                console.info(id);
                if (id > 0) {
                    $("#listaProduto").jqxGrid('selectrow', id);
                } else {
                    $("#listaProduto").jqxGrid('selectrow', 0);
                }
                $('#listaProduto').jqxGrid('focus');
            }

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
    $("#buscaProduto").jqxInput({placeHolder: "Busca Produto", height: 25, width: 300});
    loadjscssfile('../js/jProduto.js?nocache=' + Math.random(), 'js');
</script>