var tableHistorial;
$(document).ready(function () {
  listarHistorial();
});

function listarHistorial() {
  tableHistorial = $("#historial").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/Historial/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "idAsistencia" },
      { data: "solicitante" },
      { data: "sede" },
      { data: "area" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}

function ftnViewCompletado(idHistorial) {
  $.ajax({
    method: "GET",
    url: "/Historial/getCompletado/"+idHistorial,
    data: { idHistorial: idHistorial },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      //console.log(datos);
      $("#viewCompletado").text("DETALLES ASISTENCIA: " + idHistorial);
      $("#fechaAsistencia").text(datos.fechaSoli);
      $("#solicitanteAsistencia").text(datos.solicitante);
      $("#centroAsistencia").text(datos.sede);
      $("#areaAsistencia").text(datos.area);
      //var anydesk = datos.anydesk = 1 ? "SI" : "NO";
      $("#anyDesk").text(datos.anydesk);
      $("#descripcionAsistencia").text(datos.descripcion);

      $("#mdlViewCompletado").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function ftnViewDictamen(idHistorial) {
  $.ajax({
    method: "GET",
    url: "/Historial/getDictamen/"+idHistorial,
    data: { idHistorial: idHistorial },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      //console.log(datos[0]);
      $("#viewDictamen").text("DETALLES DICTAMEN: " + datos[0].idAsistencia);
      $("#DsolicitanteAsistencia").text(datos[0].solicitante);
      $("#DsedeAsistencia").text(datos[0].sede);
      $("#DdescripcionAsistencia").text(datos[0].descripcion);
      $("#desEquipo").text(datos[0].descripcionEquipo);
      $("#numSerie").text(datos[0].numeroSerie);
      $("#marca").text(datos[0].marca);
      $("#modelo").text(datos[0].modelo);
      $("#inventario").text(datos[0].inventario);
      $("#nombreAsistente").text(datos[0].asistente);
      $("#desDetEquipo").text(datos[0].descripcionDictamen);

      $("#mdlViewDictamen").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}