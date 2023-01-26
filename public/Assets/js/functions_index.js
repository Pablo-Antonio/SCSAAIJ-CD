$(document).ready(function () {
  validarTelAsistencia();
  nuevaAsistencia();
  validarLogin();
});

function nuevaAsistencia() {
  $("#form_asistencia").submit(function (event) {
    event.preventDefault();

    var formAsisencia = new FormData($("#form_asistencia")[0]);

    if (
      $("#solicitante").val() == "" ||
      $("#area").val() == "" ||
      $("#sede").val() == "" ||
      $("#descripcion").val() == "" ||
      $("#telefono").val() == ""
    ) {
      msjAlert("error", "Todos los campos son requeridos", "Campos Vacios");
      return;
    }

    var lonTel = $("#telefono").val().length;

    if (lonTel != 10) {
      msjAlert(
        "error",
        "El telefono debe tener solo 10 numeros",
        "Error Telefono"
      );
    } else {
      $.ajax({
        method: "POST",
        url: "/NuevaAsistencia",
        data: formAsisencia,
        contentType: false,
        processData: false,
      })
        .done(function (data) {
          //console.log(data);
          var datos = JSON.parse(data);
          if (datos.status == true) {
            $("#form_asistencia")[0].reset();
            msjAlert("success", datos.msg, "Éxito");
          } else {
            msjAlert("error", datos.msg, "Error");
          }
        })
        .fail(function (xhr, status) {
          console.log(xhr);
          console.log(status);
          msjAlert("error", "No se pudo realizar su petición", "Error");
        });
    }
  });
}

function validarTelAsistencia() {
  $("#telefono").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
  });
}

function validarLogin() {
  $("#login_form").submit(function (event) {
    event.preventDefault();

    if ($("#usuario").val() == "" || $("#password").val() == "") {
      msjAlert(
        "warning",
        "Todos los campos son necesarios",
        "Campos Vacios"
      );
      return;
    }

    var formData = new FormData($("#login_form")[0]);

    $.ajax({
      method: "POST",
      url: "/Validar",
      data: formData,
      contentType: false,
      processData: false,
    })
      .done(function (data) {
        //console.log(data);
        var datos = JSON.parse(data);
        if (datos.status == true) {
          //msjAlert("success", datos.msg, "Éxito");
          $(location).attr("href", "Dashboard");
        } else {
          $("#login_form")[0].reset();
          msjAlert("error", datos.msg, "Error");
        }
      })
      .fail(function (xhr, status) {
        console.log(xhr);
        console.log(status);
        msjAlert("error", "No se pudo realizar su petición", "Error");
      });
  });
}
