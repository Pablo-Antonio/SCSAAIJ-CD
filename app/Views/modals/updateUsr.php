<div class="modal fade" id="mdlUpdateUsr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">ACTUALIZAR USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form id="form_actualizarUsuario" autocomplete="off">
                    <input type="hidden" id="updIdUsr" name="updIdUsr">
                    <div class="card-body">
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="nomValUpd">
                                </i> Nombre (s): </label>
                            <input type="text" class="form-control" id="nombreUpd" name="nombreUpd" placeholder="Ingresar nombre(s)">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="apePatValUpd">
                                </i> Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apePatUpd" name="apePatUpd" placeholder="Ingresar Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="apeMatValUpd">
                                </i> Apellido Materno:</label>
                            <input type="text" class="form-control" id="apeMatUpd" name="apeMatUpd" placeholder="Ingresar Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="telValUpd">
                                </i> Telefono:</label>
                            <input type="text" class="form-control" id="telefonoUpd" name="telefonoUpd" placeholder="Ingresar Telefono">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="nomUsrValUpd">
                                </i> Nombre Usuario</label>
                            <input type="text" class="form-control" id="nombreUsrUpd" name="nombreUsrUpd" placeholder="Ingresar Nombre de Usuario">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="passValUpd">
                                </i> Contraseña: </label>
                            <input type="text" class="form-control" id="passwordUpd" name="passwordUpd" placeholder="Ingresar Contraseña">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo: </label>
                            <select class="custom-select form-control-border" id="tipoUpd" name="tipoUpd">
                                <option value="Pasante">Pasante</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <button type="button" class="btn btn-danger" 
                        data-dismiss="modal" id="cancelarUpdate">Cancelar</button>
                    </div>
                </form>
                <!-- /.card -->
            </div>
            <!--<div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" id="completar">Completar</button>
                <button type="button" class="btn btn-primary" id="dictamen">Dictamen</button>
            </div>-->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->