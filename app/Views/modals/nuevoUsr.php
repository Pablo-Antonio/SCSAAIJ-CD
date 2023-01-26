<div class="modal fade" id="mdlNewUsr">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">NUEVO USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- general form elements -->
                <form id="form_nuevoUsuario" autocomplete="off">
                    <div class="card-body">
                        <div class="form-group">
                            <label id=""> <i class="far fa-times-circle" id="nomVal">
                                </i> Nombre (s): </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresar nombre(s)">
                        </div>
                        <div class="form-group">
                            <label for=""> <i class="far fa-times-circle" id="apePatVal">
                                </i> Apellido Paterno:</label>
                            <input type="text" class="form-control" id="apePat" name="apePat" placeholder="Ingresar Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="apeMatVal">
                                </i> Apellido Materno:</label>
                            <input type="text" class="form-control" id="apeMat" name="apeMat" placeholder="Ingresar Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="telVal">
                                </i> Telefono:</label>
                            <input type="number" class="form-control" maxlength="10"
                            id="telefono" name="telefono" placeholder="Ingresar solo 10 digitos">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="nomUsrVal">
                                </i> Nombre Usuario</label>
                            <input type="text" class="form-control" id="nombreUsr" name="nombreUsr" placeholder="Ingresar Nombre de Usuario">
                        </div>
                        <div class="form-group">
                            <label for=""><i class="far fa-times-circle" id="passVal">
                                </i> Contraseña: </label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingresar Contraseña">
                        </div>

                        <div class="form-group">
                            <label for="">Tipo: </label>
                            <select class="custom-select form-control-border" id="tipo" name="tipo">
                                <option value="Pasante">Pasante</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success">Registrar</button>
                        <button type="button" class="btn btn-danger" 
                        id="cancelarNuevoUsr" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->