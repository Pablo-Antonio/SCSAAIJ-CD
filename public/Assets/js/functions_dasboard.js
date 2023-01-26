$(document).ready(function () {
  asistenciasPendientes();
  dictamenRealizados();
  sinDictamen();
  usuariosRegistrados();
});

function asistenciasPendientes() {
  $.ajax({
    method: "GET",
    url: "/Dashboard/Pendientes",
  })
    .done(function (data) {
      //console.log(data);
      $("#asistenciasPendientes").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function dictamenRealizados() {
  $.ajax({
    method: "GET",
    url: "/Dashboard/Dictamen",
  })
    .done(function (data) {
      //console.log(data);
      $("#dictamenesRealizados").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function sinDictamen() {
  $.ajax({
    method: "GET",
    url: "/Dashboard/Completado",
  })
    .done(function (data) {
      //console.log(data);
      $("#sinDictamen").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}

function usuariosRegistrados() {
  $.ajax({
    method: "GET",
    url: "/Dashboard/Usuarios",
  })
    .done(function (data) {
      //console.log(data);
      $("#usuariosRegistrados").text(data);
    })
    .fail(function () {
      msjAlert("error", "Error con el Servidor", "Error");
      //alert("Algo salió mal");
    });
}