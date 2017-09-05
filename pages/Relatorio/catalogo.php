<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Catalogo Valparts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="widget">
        <fieldset>
            <h5>Selecione o Tipo de Catalogo</h5>
            <label for="radio-1">Completo</label>
            <input type="radio" name="radio-1" id="radio-1">
            <label for="radio-2">Promoção</label>
            <input type="radio" name="radio-1" id="radio-2">
            <label for="radio-3">Itens Selecionados</label>
            <input type="radio" name="radio-1" id="radio-3">
        </fieldset>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        //$( "input" ).checkboxradio();
        $("input").checkboxradio({icon: false});
// Evento Para Reimprimir um Mic
        $("#radio-1").click(function () {
            window.open("../Relatorios/Catalogo.php");
        });
        $("#radio-2").click(function () {
            //window.open("../Relatorios/Catalogo.php");
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
    //loadjscssfile('../js/custom_jquery.js?nocache=' + Math.random(), 'js');
    //loadjscssfile('../js/jGerenciar.js?nocache=' + Math.random(), 'js');
</script>