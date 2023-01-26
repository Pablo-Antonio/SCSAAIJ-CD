    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card" id="listadoAsistencias">
                        <div class="card-header">
                            <h3 class="card-title">ASISTENCIAS PENDIENTES</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="asistencias" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Sede</th>
                                        <th>Area</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Solicitante</th>
                                        <th>Sede</th>
                                        <th>Area</th>
                                        <th>Detalles</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div id="formularioDictamen">
                        <div><button type="button" class="btn btn-danger" id="cancelarDictamen">Cancelar Dictamen</button></div>
                        <br>

                        <div class="card card-primary">

                            <div class="card-header">
                                <h1 class="card-title" id="tituloDictamen">ASISTENCIA: </h1>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="form_dictamen" autocomplete="off">
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
                                        <label for=""><i class="far fa-times-circle" id="desEquipoVal">
                                            </i> Descripción Equipo: </label>
                                        <input type="text" class="form-control" id="desEquipo" name="desEquipo" placeholder="Descripción del Equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="far fa-times-circle" id="numSerieVal">
                                            </i> Número Serie:</label>
                                        <input type="text" class="form-control" id="numSerie" name="numSerie" placeholder="Número de Serie del Equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="far fa-times-circle" id="marcaVal">
                                            </i> Marca:</label>
                                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="far fa-times-circle" id="modeloVal">
                                            </i> Modelo:</label>
                                        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo del equipo">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="far fa-times-circle" id="inventarioVal">
                                            </i> Inventario</label>
                                        <input type="text" class="form-control" id="inventario" name="inventario" placeholder="Inventario">
                                    </div>

                                    <div class="form-group">
                                        <h4>Asistente</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for=""><i class="far fa-times-circle" id="nomAsisVal">
                                            </i> Nombre Asistente: </label>
                                        <input type="text" class="form-control" id="nombreAsistente" name="nombreAsistente" placeholder="Nombre del asistente que reviso el equipo">
                                    </div>

                                    <div class="form-group">
                                        <h4><i class="far fa-times-circle" id="desDetEquipoVal">
                                            </i> Descripción Detallada del Equipo</h4>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción Equipo: </label>
                                        <textarea class="form-control" rows="3" id="desDetEquipo" name="desDetEquipo" placeholder="Descripción Detallada del Análisis"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Realizar Dictamen</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->