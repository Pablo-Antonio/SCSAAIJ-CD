<div class="modal fade" id="mdlViewDictamen">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="viewDictamen"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form>
                    <input type="hidden" id="hiddenDictamen" name="hiddenDictamen">
                    <div class="card-body">
                        <div class="form-group">
                            <h4>Datos Asistencia</h4>
                        </div>

                        <div class="form-group">
                            <label for="">Solicitante: </label>
                            <p id="DsolicitanteAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Sede: </label>
                            <p id="DsedeAsistencia"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion Asistencia: </label>
                            <p id="DdescripcionAsistencia"></p>
                        </div>

                        <div class="form-group">
                            <h4>Datos del Equipo</h4>
                        </div>
                        <div class="form-group">
                            <label for="">Descripción Equipo: </label>
                            <p id="desEquipo"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Número Serie:</label>
                            <p id="numSerie"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Marca:</label>
                            <p id="marca"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Modelo:</label>
                            <p id="modelo"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Inventario</label>
                            <p id="inventario"></p>
                        </div>

                        <div class="form-group">
                            <h4>Asistente</h4>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre Asistente: </label>
                            <p id="nombreAsistente"></p>
                        </div>

                        <div class="form-group">
                            <h4>Descripción Detallada del Equipo</h4>
                        </div>
                        <div class="form-group">
                            <label for="">Descripción Equipo: </label>
                            <p id="desDetEquipo"></p>
                        </div>
                    </div>
                    <!-- /.card-body -->
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