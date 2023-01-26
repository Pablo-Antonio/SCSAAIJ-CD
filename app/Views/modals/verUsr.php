<div class="modal fade" id="mdlViewUsr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="viewAsistencia">INFORMACION DEL USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nombre(s): </label>
                            <p id="viewNombre"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Paterno: </label>
                            <p id="viewApePat"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Apellido Materno: </label>
                            <p id="viewApeMat"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Telefono: </label>
                            <p id="viewTelefono"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Nombre Usuario: </label>
                            <p id="viewNomUsr"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Tipo:</label>
                            <p id="viewTipo"></p>
                        </div>

                        <div class="form-group">
                            <label for="">Estatus: </label>
                            <small class="badge" id="viewStatus">Inactivo</small>
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