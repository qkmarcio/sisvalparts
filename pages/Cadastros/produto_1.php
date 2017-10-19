<div class="modal fade" tabindex="-2" role="dialog" id="telaProduto" >
    <div class="modal-dialog" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Poducto</h4>
            </div>
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-8">
                        <button type="button" class="btn btn-default" >Nuevo</button>
                        <button type="button" class="btn btn-default" >Editar</button>
                        <button type="button" class="btn btn-default" >Vista</button>
                    </div>
                    <div class="col-md-4">
                        <input type="text" id="ProdBuscaProduto" style="text-transform: uppercase"/>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div id="ProdListaProduto"></div>
                            <div id="ProdListaCompra"></div>
                        </div>
                        <!-- /.col-lg-8 -->
                        <!-- /.col-lg-8
                        <div class="col-lg-4">
                            <img id="imgProduto" style="margin-top: 8px" height="250" width="300" src="../Fotos/error.jpg"/>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id='ProdListaExcel' type="button" class="btn btn-primary">Exp Excel</button>
                <button id='ProdListaPdf' type="button" class="btn btn-primary">Exp PDF</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->