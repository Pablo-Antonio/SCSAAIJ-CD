var tableUsuarios;
$(document).ready(function () {
  listarUsuarios();

  validarTelNuevo();
  validarTelUpd();

  classFormNuevo();
  classFormUpdate();

  nuevoUsr();
  ftnUpdUsr();

  cancelarNuevo();
  cancelarUpdate();
});

function ftnAccUsr(idUsuario, opcion) {
  $.ajax({
    method: "POST",
    url: "/Usuarios/actDes",
    data: { idUsuario: idUsuario, opcion: opcion },
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      if (datos.status == true) {
        tableUsuarios.api().ajax.reload();
        msjAlert("success", "", datos.msg);
      } else {
        msjAlert("error", datos.msg, "Error");
      }
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
    });
}

function listarUsuarios() {
  tableUsuarios = $("#tableUsuarios").dataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "/Usuarios/getAll",
      dataSrc: "",
    },
    columns: [
      { data: "nombre" },
      { data: "apePat" },
      { data: "apeMat" },
      { data: "telefono" },
      { data: "tipo" },
      { data: "status" },
      { data: "acciones" },
    ],
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}

function ftnViewUsr(idUsuario) {
  $.ajax({
    method: "GET",
    url: "/Usuarios/getId/" + idUsuario,
  })
    .done(function (data) {
      //console.log(data);
      var datos = JSON.parse(data);
      $("#mdlViewUsr").modal("show");
      $("#viewNombre").text(datos.nombre);
      $("#viewApePat").text(datos.apePat);
      $("#viewApeMat").text(datos.apeMat);
      $("#viewTelefono").text(datos.telefono);
      $("#viewNomUsr").text(datos.nomUsr);
      $("#viewTipo").text(datos.tipo);

      if (datos.status == 1) {
        $("#viewStatus").removeClass("badge-danger");
        $("#viewStatus").addClass("badge-success");
        $("#viewStatus").text("ACTIVO");
      } else {
        $("#viewStatus").removeClass("badge-success");
        $("#viewStatus").addClass("badge-danger");
        $("#viewStatus").text("INACTIVO");
      }
    })
    .fail(function (xhr, status) {
      console.log(xhr);
      console.log(status);
      msjAlert("error", "No se pudo realizar su petición", "Error");
    });
}

function nuevoUsr() {
  $("#btnNuevoUsr").on("click", function () {
    $("#mdlNewUsr").modal("show");
    $("#form_nuevoUsuario").submit(function (event) {
      event.preventDefault();
      var formNuevo = new FormData($("#form_nuevoUsuario")[0]);

      var lonTel = $("#telefono").val().length;

      if (!validarFormNuevo()) {
        msjAlert("error", "Los campos en rojo son requeridos", "Campos Vacios");
      } else {
        if (lonTel != 10) {
          $("#telefono").addClass("is-invalid");
          $("#telVal").show();
          msjAlert(
            "error",
            "El telefono debe tener solo 10 numeros",
            "Error Telefono"
          );
          //console.log("Longitud: " + lonTel + " / " + $("#telefono").val());
        } else {
          $("#telefono").removeClass("is-invalid");
          $("#telVal").hide();
          //console.log("Longitud: " + lonTel + " / " + $("#telefono").val());
          $.ajax({
            method: "POST",
            url: "/Usuarios/nuevo",
            data: formNuevo,
            contentType: false,
            processData: false,
          })
            .done(function (data) {
              //console.log(data);
              var datos = JSON.parse(data);
              if (datos.status == true) {
                $("#mdlNewUsr").modal("hide");
                tableUsuarios.api().ajax.reload();
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
      }
    });
  });
}

function validarFormNuevo() {
  var bandera;
  //bandera ? "" : "";
  //$("#nombre").val() == ""? $("#nombre").addClass("is-invalid"):$("#nombre").removeClass("is-invalid");
  if ($("#nombre").val() == "") {
    $("#nombre").addClass("is-invalid");
    $("#nomVal").show();
    bandera = false;
  } else {
    $("#nombre").removeClass("is-invalid");
    $("#nomVal").hide();
    bandera = true;
  }

  if ($("#apePat").val() == "") {
    $("#apePat").addClass("is-invalid");
    $("#apePatVal").show();
    bandera = false;
  } else {
    $("#apePat").removeClass("is-invalid");
    $("#apePatVal").hide();
    bandera = true;
  }

  if ($("#apeMat").val() == "") {
    $("#apeMat").addClass("is-invalid");
    $("#apeMatVal").show();
    bandera = false;
  } else {
    $("#apeMat").removeClass("is-invalid");
    $("#apeMatVal").hide();
    bandera = true;
  }

  if ($("#telefono").val() == "") {
    $("#telefono").addClass("is-invalid");
    $("#telVal").show();
    bandera = false;
  } else {
    $("#telefono").removeClass("is-invalid");
    $("#telVal").hide();
    bandera = true;
  }

  if ($("#nombreUsr").val() == "") {
    $("#nombreUsr").addClass("is-invalid");
    $("#nomUsrVal").show();
    bandera = false;
  } else {
    $("#nombreUsr").removeClass("is-invalid");
    $("#nomUsrVal").hide();
    bandera = true;
  }

  if ($("#password").val() == "") {
    $("#password").addClass("is-invalid");
    $("#passVal").show();
    bandera = false;
  } else {
    $("#password").removeClass("is-invalid");
    $("#passVal").hide();
    bandera = true;
  }
  return bandera;
}

function validarTelNuevo() {
  $("#telefono").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
  });
}

function cancelarNuevo() {
  $("#cancelarNuevoUsr").on("click", function () {
    $("#form_nuevoUsuario")[0].reset();
    classFormNuevo();
  });
}

function classFormNuevo() {
  $("#nomVal").hide();
  $("#apePatVal").hide();
  $("#apeMatVal").hide();
  $("#telVal").hide();
  $("#nomUsrVal").hide();
  $("#passVal").hide();

  $("#nombre").removeClass("is-invalid");
  $("#apePat").removeClass("is-invalid");
  $("#apeMat").removeClass("is-invalid");
  $("#telefono").removeClass("is-invalid");
  $("#nombreUsr").removeClass("is-invalid");
  $("#password").removeClass("is-invalid");
}

function viewFormUpd(idUsuario) {
  $.ajax({
    method: "GET",
    url: "/Usuarios/getId/" + idUsuario,
  })
    .done(function (data) {
      //console.log(data);
      //var datos = JSON.parse(data);
      var datos = JSON.parse(data);
      $("#mdlUpdateUsr").modal("show");
      $("#updIdUsr").val(idUsuario);
      $("#nombreUpd").val(datos.nombre);
      $("#apePatUpd").val(datos.apePat);
      $("#apeMatUpd").val(datos.apeMat);
      $("#telefonoUpd").val(datos.telefono);
      $("#nombreUsrUpd").val(datos.nomUsr);
      $("#passwordUpd").val("");
      $("#tipoUpd").val(datos.tipo);
    })
    .fail(function (xhr, status) {
      console.log(xhr);
      console.log(status);
      msjAlert("error", "No se pudo realizar su petición", "Error");
    });
}

function ftnUpdUsr() {
  $("#form_actualizarUsuario").submit(function (event) {
    event.preventDefault();
    var formUpdUsr = new FormData($("#form_actualizarUsuario")[0]);
    var idUsuario = $("#updIdUsr").val();
    formUpdUsr.append("idUsuario", idUsuario);

    var lonTel = $("#telefonoUpd").val().length;

    if (!validarFormUpdate()) {
      msjAlert("error", "Los campos en rojo son requeridos", "Campos Vacios");
    } else {
      if (lonTel != 10) {
        $("#telefonoUpd").addClass("is-invalid");
        $("#telValUpd").show();
        msjAlert(
          "error",
          "El telefono debe tener solo 10 numeros",
          "Error Telefono"
        );
        //console.log("Longitud: " + lonTel + " / " + $("#telefono").val());
      } else {
        $("#telefonoUpd").removeClass("is-invalid");
        $("#telValUpd").hide();
        //console.log("Longitud: " + lonTel + " / " + $("#telefono").val());
        $.ajax({
          method: "POST",
          url: "/Usuarios/actualizar",
          data: formUpdUsr,
          contentType: false,
          processData: false,
        })
          .done(function (data) {
            //console.log(data);
            var datos = JSON.parse(data);
            if (datos.status == true) {
              $("#mdlUpdateUsr").modal("hide");
              tableUsuarios.api().ajax.reload();
              msjAlert("success", datos.msg, "Éxito");
            } else {
              msjAlert("error", datos.msg, "Error");
            }
          })
          .fail(function (xhr, status) {
            //console.log(xhr);
            //console.log(status);
            msjAlert("error", "No se pudo realizar su petición", "Error");
          });
      }
    }
  });
}

function validarFormUpdate() {
  var bandera;
  if ($("#nombreUpd").val() == "") {
    $("#nombreUpd").addClass("is-invalid");
    $("#nomValUpd").show();
    bandera = false;
  } else {
    $("#nombreUpd").removeClass("is-invalid");
    $("#nomValUpd").hide();
    bandera = true;
  }

  if ($("#apePatUpd").val() == "") {
    $("#apePatUpd").addClass("is-invalid");
    $("#apePatValUpd").show();
    bandera = false;
  } else {
    $("#apePatUpd").removeClass("is-invalid");
    $("#apePatValUpd").hide();
    bandera = true;
  }

  if ($("#apeMatUpd").val() == "") {
    $("#apeMatUpd").addClass("is-invalid");
    $("#apeMatValUpd").show();
    bandera = false;
  } else {
    $("#apeMatUpd").removeClass("is-invalid");
    $("#apeMatValUpd").hide();
    bandera = true;
  }

  if ($("#telefonoUpd").val() == "") {
    $("#telefonoUpd").addClass("is-invalid");
    $("#telValUpd").show();
    bandera = false;
  } else {
    $("#telefonoUpd").removeClass("is-invalid");
    $("#telValUpd").hide();
    bandera = true;
  }

  if ($("#nombreUsrUpd").val() == "") {
    $("#nombreUsrUpd").addClass("is-invalid");
    $("#nomUsrValUpd").show();
    bandera = false;
  } else {
    $("#nombreUsrUpd").removeClass("is-invalid");
    $("#nomUsrValUpd").hide();
    bandera = true;
  }

  if ($("#passwordUpd").val() == "") {
    $("#passwordUpd").addClass("is-invalid");
    $("#passValUpd").show();
    bandera = false;
  } else {
    $("#passwordUpd").removeClass("is-invalid");
    $("#passValUpd").hide();
    bandera = true;
  }
  return bandera;
}

function classFormUpdate() {
  $("#nomValUpd").hide();
  $("#apePatValUpd").hide();
  $("#apeMatValUpd").hide();
  $("#telValUpd").hide();
  $("#nomUsrValUpd").hide();
  $("#passValUpd").hide();

  $("#nombreUpd").removeClass("is-invalid");
  $("#apePatUpd").removeClass("is-invalid");
  $("#apeMatUpd").removeClass("is-invalid");
  $("#telefonoUpd").removeClass("is-invalid");
  $("#nombreUsrUpd").removeClass("is-invalid");
  $("#passwordUpd").removeClass("is-invalid");
}

function cancelarUpdate() {
  $("#cancelarUpdate").on("click", function () {
    $("#form_actualizarUsuario")[0].reset();
    classFormUpdate();
  });
}

function validarTelUpd() {
  $("#telefonoUpd").keyup(function () {
    this.value = (this.value + "").replace(/[^0-9]/g, "");
  });
}
