let base_url = "http://localhost:8080";

function msjAlert(tipo, msj, titulo) {
  Swal.fire({
    position: "top-end",
    type: tipo,
    title: titulo,
    text: msj,
    showConfirmButton: false,
    timer: 1550,
  });
}
