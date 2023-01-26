var tableAsistencias;
$(document).ready(function () {
  listarAsistencias();
  mostrarForm(false);
  classFormDictamen();

  fntCompletado();
  fntRealizarDictamen();
  ftnGuardarDictamen();
  ftnCancelarDictamen();
});

function listarAsistencias() {
  tableAsistencias = $("#asistencias").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/Asistencias/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "idAsistencia" },
      { data: "solicitante" },
      { data: "sede" },
      { data: "area" },
      { data: "acciones" },
    ],
    /*dom: "lBfrtip",
      buttons: [
        {
          extend: "copyHtml5",
          text: "<i class='far fa-copy'></i> Copiar",
          titleAttr: "Copiar",
          className: "btn btn-secondary",
        },
        {
          extend: "excelHtml5",
          text: "<i class='fas fa-file-excel'></i> Excel",
          titleAttr: "Esportar a Excel",
          className: "btn btn-success",
        },
        {
          extend: "pdfHtml5",
          text: "<i class='fas fa-file-pdf'></i> PDF",
          titleAttr: "Esportar a PDF",
          className: "btn btn-danger",
        },
        {
          extend: "csvHtml5",
          text: "<i class='fas fa-file-csv'></i> CSV",
          titleAttr: "Esportar a CSV",
          className: "btn btn-info",
        },
      ],*/
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}

function ftnViewAsistencia(idAsistencia) {
  $.ajax({
    method: "GET",
    url: "/Asistencias/getId/" + idAsistencia,
  })
    .done(function (data) {
      var datos = JSON.parse(data);
      //console.log(datos);
      $("#hidden").val(idAsistencia);
      $("#viewAsistencia").text("DETALLES ASISTENCIA: " + idAsistencia);
      $("#fechaAsistencia").text(datos.fechaSoli);
      $("#solicitanteAsistencia").text(datos.solicitante);
      $("#centroAsistencia").text(datos.sede);
      $("#areaAsistencia").text(datos.area);
      //var anydesk = datos.anydesk = 1 ? "SI" : "NO";
      $("#anyDesk").text(datos.anydesk);
      $("#descripcionAsistencia").text(datos.descripcion);

      $("#mdlViewAsistencia").modal("show");
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function fntCompletado() {
  $("#completar").on("click", function () {
    $("#mdlViewAsistencia").modal("hide");
    idAsistencia = $("#hidden").val();

    Swal.fire({
      title: "¿Estás seguro?",
      text: "No se realizará el dictamen de la asistencia : " + idAsistencia,
      type: "warning",
      allowOutsideClick: false, //para que no se cierra al dar clic afuera
      //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
      showCancelButton: true,
      confirmButtonText: "Sí, completar",
      cancelButtonText: "No, cancelar",
    }).then((resultado) => {
      if (resultado.value) {
        // Hicieron click en "Sí"
        $.ajax({
          method: "POST",
          url: "/Asistencias/completado",
          data: { idAsistencia: idAsistencia },
        })
          .done(function (data) {
            console.log(data);
            var datos = JSON.parse(data);
            if (datos.status == true) {
              msjAlert("success", datos.msg, "Éxito");
              tableAsistencias.api().ajax.reload();
            } else {
              msjAlert("error", datos.msg, "Error");
            }
          })
          .fail(function (xhr, status) {
            console.log(xhr);
            console.log(status);
            msjAlert("error", "No se pudo realizar su petición", "Error");
          });
      } else {
        msjAlert("error", "", "Operación Cancelada");
      }
    });
  });
}

function fntRealizarDictamen() {
  $("#dictamen").on("click", function () {
    idAsistencia = $("#hidden").val();
    $("#mdlViewAsistencia").modal("hide");
    mostrarForm(true);
    $("#tituloDictamen").text("NÚMERO ASISTENCIA: " + idAsistencia);
    $.ajax({
      method: "get",
      url: "/Asistencias/getId/" + idAsistencia,
    })
      .done(function (data) {
        var datos = JSON.parse(data);
        //console.log(datos);
        $("#hiddenDictamen").val(datos.idAsistencia);
        $("#DsolicitanteAsistencia").text(datos.solicitante);
        $("#DsedeAsistencia").text(datos.sede);
        $("#DdescripcionAsistencia").text(datos.descripcion);
      })
      .fail(function () {
        msjAlert("error", "Error con el Servidor", "Error");
      });
  });
}

function ftnGuardarDictamen() {
  $("#form_dictamen").submit(function (event) {
    event.preventDefault();
    var idAsistencia = $("#hiddenDictamen").val();
    var formDictamen = new FormData($("#form_dictamen")[0]);
    formDictamen.append("idAsistencia", idAsistencia);

    if (!validarFormDictamen()) {
      msjAlert("error", "Los campos en rojo son requeridos", "Campos Vacios");
    } else {
      $.ajax({
        method: "POST",
        url: "/Asistencias/dictamen",
        data: formDictamen,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#form_dictamen")[0].reset();
            classFormDictamen();
            mostrarForm(false);
            tableAsistencias.api().ajax.reload();
            msjAlert("success", datos.msg, "Éxito");
          } else {
            msjAlert("error", datos.msg, "Error");
          }
        })
        .fail(function () {
          msjAlert("error", "Error con el Servidor", "Error");
        });
    }
  });
}

function ftnCancelarDictamen() {
  $("#cancelarDictamen").on("click", function () {
    Swal.fire({
      title: "¿Estás seguro?",
      text:
        "¿Deeas cancelar el dictamen de la asistencia : " + idAsistencia + " ?",
      type: "warning",
      allowOutsideClick: false, //para que no se cierra al dar clic afuera
      //allowEnterKey:true, //cuando pulse la letra enter podra quitar el mensaje
      showCancelButton: true,
      confirmButtonText: "Sí",
      cancelButtonText: "No",
    }).then((resultado) => {
      if (resultado.value) {
        // Hicieron click en "Sí"
        msjAlert("success", "", "Dictamen Cancelado");
        $("#form_dictamen")[0].reset();
        classFormDictamen();
        mostrarForm(false);
      }
    });
  });
}

function validarFormDictamen() {
  var bandera;
  if ($("#desEquipo").val() == "") {
    $("#desEquipo").addClass("is-invalid");
    $("#desEquipoVal").show();
    bandera = false;
  } else {
    $("#desEquipo").removeClass("is-invalid");
    $("#desEquipoVal").hide();
    bandera = true;
  }

  if ($("#numSerie").val() == "") {
    $("#numSerie").addClass("is-invalid");
    $("#numSerieVal").show();
    bandera = false;
  } else {
    $("#numSerie").removeClass("is-invalid");
    $("#numSerieVal").hide();
    bandera = true;
  }

  if ($("#marca").val() == "") {
    $("#marca").addClass("is-invalid");
    $("#marcaVal").show();
    bandera = false;
  } else {
    $("#marca").removeClass("is-invalid");
    $("#marcaVal").hide();
    bandera = true;
  }

  if ($("#modelo").val() == "") {
    $("#modelo").addClass("is-invalid");
    $("#modeloVal").show();
    bandera = false;
  } else {
    $("#modelo").removeClass("is-invalid");
    $("#modeloVal").hide();
    bandera = true;
  }

  if ($("#inventario").val() == "") {
    $("#inventario").addClass("is-invalid");
    $("#inventarioVal").show();
    bandera = false;
  } else {
    $("#inventario").removeClass("is-invalid");
    $("#inventarioVal").hide();
    bandera = true;
  }

  if ($("#nombreAsistente").val() == "") {
    $("#nombreAsistente").addClass("is-invalid");
    $("#nomAsisVal").show();
    bandera = false;
  } else {
    $("#nombreAsistente").removeClass("is-invalid");
    $("#nomAsisVal").hide();
    bandera = true;
  }

  if ($("#desDetEquipo").val() == "") {
    $("#desDetEquipo").addClass("is-invalid");
    $("#desDetEquipoVal").show();
    bandera = false;
  } else {
    $("#desDetEquipo").removeClass("is-invalid");
    $("#desDetEquipoVal").hide();
    bandera = true;
  }
  return bandera;
}

function classFormDictamen() {
  $("#desEquipoVal").hide();
  $("#numSerieVal").hide();
  $("#marcaVal").hide();
  $("#modeloVal").hide();
  $("#inventarioVal").hide();
  $("#nomAsisVal").hide();
  $("#desDetEquipoVal").hide();

  $("#desEquipo").removeClass("is-invalid");
  $("#numSerie").removeClass("is-invalid");
  $("#marca").removeClass("is-invalid");
  $("#modelo").removeClass("is-invalid");
  $("#inventario").removeClass("is-invalid");
  $("#nombreAsistente").removeClass("is-invalid");
  $("#desDetEquipo").removeClass("is-invalid");
}

function mostrarForm(flag) {
  if (flag) {
    $("#formularioDictamen").show();
    $("#listadoAsistencias").hide();
  } else {
    $("#listadoAsistencias").show();
    $("#formularioDictamen").hide();
  }
}
