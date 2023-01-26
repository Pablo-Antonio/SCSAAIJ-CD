<div class="modal fade" id="mdlViewCompletado">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="viewCompletado"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form>
                    <input type="hidden" id="hidden">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Fecha Solicitud: </label>
                            <p id="fechaAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Solicitante: </label>
                            <p id="solicitanteAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Sede: </label>
                            <p id="centroAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Area: </label>
                            <p id="areaAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">AnyDesk: </label>
                            <p id="anyDesk"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion:</label>
                            <p id="descripcionAsistencia"></p>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->