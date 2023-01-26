<!DOCTYPE html>
<html lang="es">

<head>
  <title>SCSAAIJ</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="<?=base_url()?>/Assets/css/index.css">
  
  
  <!--<link rel="stylesheet" href="Assets/sweetalert/sweetalert2.min.css">-->

</head>

<body>

  <div class="w3-top">
    <div class="w3-bar w3-white w3-card" id="myNavbar">
      <a href="#home" class="w3-bar-item w3-button w3-wide">SCSAAIJ</a>

      <div class="w3-right w3-hide-small">
        <a href="#acercade" class="w3-bar-item w3-button">ACERCA DE</a>
        <a href="#sesion" class="w3-bar-item w3-button"><i class="fa fa-user"></i> USUARIOS </a>
        <a href="#registrar" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> REGISTRAR ASISTENCIA</a>
      </div>

      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>

  <nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>
    <a href="#acercade" onclick="w3_close()" class="w3-bar-item w3-button">ACERCA DE</a>
    <a href="#sesion" onclick="w3_close()" class="w3-bar-item w3-button"> INICIAR SESION </a>
    <a href="#registrar" onclick="w3_close()" class="w3-bar-item w3-button">REGISTRAR ASISTENCIA</a>
  </nav>


  <header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
    <div class="w3-display-left w3-text-white" style="padding:48px">
      <span class="w3-jumbo w3-hide-small">SCSAAIJ</span><br>
      <span class="w3-large">Sistema para el control de solicitud de asistencias para el area de informatica
        jurisdiccional</span>
      <p><a href="#acercade" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Ver
          mas...</a></p>
    </div>
  </header>


  <div class="w3-container w3-dark-grey" style="padding:128px 16px" id="acercade">
    <h3 class="w3-center">SCSAAIJ</h3> <br>
    <div class="w3-row-padding">
      <div class="w3-col m6">
        <h3>Sabias que...</h3>
        <p>SCSAAIJ es un sistema diseñado para llevar el control de todas aquellas solicitudes de asistencia que se
          reciban en el area de informatica jurisdiccional, permitiendo asi al usuario brindar una mejor atencion en el
          menor tiempo posible. </p>
      </div>
      <div class="w3-col m6">
        <img class="w3-image w3-round-large" src="https://www.segurchollo.com/wp-content/uploads/2017/11/asistencia_a_domicilio_apunts01.jpg" alt="Buildings" width="700" height="394">
      </div>
    </div>
  </div>


  <div class="w3-container" style="padding:128px 10px; margin-top: -80px;" id="sesion">
    <h3 class="w3-center">LOGIN</h3>
    <div class="w3-row-padding w3-grayscale" style="margin-top:20px">
      <div class="w3-col l3 m6 w3-margin-bottom" style="width: 40%;">
        <div class="w3-card" style="text-align: center;">
          <div class="w3-container">
            <img src="<?=base_url()?>/Assets/img/sesion.png" alt="sesion" style="width:35%;">
            <h3>Iniciar Sesion</h3>
            <p>Si cuentas con usuario y contraseña ingresa los datos en el siguiente apartado</p>
          </div>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom" style="width: 60%;">
        <div class="w3-card">
          <div class="w3-container">
            <!--formulario 1-->
            <form autocomplete="off" id="login_form" style="margin-top: 20px;">
              <div class="usuario">
                <label for="usuario"></label>
                <input type="text" placeholder="USUARIO" name="usuario" id="usuario">
              </div>
              <div class="contraseña">
                <label for="contraseña"></label>
                <input type="password" placeholder="contraseña" name="password" id="password">
              </div>
              <!--<div class="submit">-->
              <button class="w3-button w3-light-grey w3-block" type="submit">
                <i class="fa fa-check-circle"></i> Iniciar sesion
              </button>
            </form>
            <!--formulario 1-->
          </div>

        </div>
      </div>
    </div>
  </div>


  <div class="w3-container w3-center w3-dark-grey" style="padding:128px 25px" id="registrar">
    <h3 class="w3-center">REGISTRAR ASISTENCIA</h3>
    <p class="w3-center w3-large">Llena el siguiente formulario. Nosotros recibiremos tu mensaje.</p>
    <div style="margin-top:48px">
      <!--formulario 2-->
      <form autocomplete="off" id="form_asistencia">
        <p> Nombre completo
          <input class="w3-input w3-border w3-white" type="text" name="solicitante" id="solicitante">
        </p>
        <p> Area
          <input class="w3-input w3-border w3-white" type="text" name="area" id="area">
        </p>
        <p> Sede
          <input class="w3-input w3-border w3-white" type="text" name="sede" id="sede">
        </p>
        <p> A continuación describa el problema que se presenta:
          <input class="w3-input w3-border w3-white" type="text" style="height: 100px; padding: 20px;" name="descripcion" id="descripcion">
        </p>
        <p>Numero de telefono personal
          <input class="w3-input w3-border w3-white" type="number" name="telefono" id="telefono" placeholder="Numero">
        </p>
        <p>Su equipo de computo ¿Cuenta con ANYDESK?, es un programa con el siguiente icono
          <img src="https://images-na.ssl-images-amazon.com/images/I/11EHDN%2B%2BanL.png" alt="" style="width: 50px;">
          para poder brindarle apoyo via remota
        </p>
        <select name="anydesk" id="anydesk">
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>
        <button class="w3-button w3-black" type="submit">
          <i class="fa fa-paper-plane"></i> ENVIAR ASISTENCIA
        </button>
        </p>
      </form>
      <!--formulario 2-->
    </div>
  </div>

  <footer class="w3-center w3-black w3-padding-64">
    <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>HOME</a>
    <br><br>
    <p> SCSAAIJ </p>
  </footer>


  <script src="<?= base_url() ?>/Assets/js/jquery-3.6.3.min.js"></script>
  <script src="<?= base_url() ?>/Assets/js/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>/Assets/js/helpers.js"></script>
  <script src="<?= base_url() ?>/Assets/js/functions_index.js"></script>-

  <script>
    function onClick(element) {
      document.getElementById("img01").src = element.src;
      document.getElementById("modal01").style.display = "block";
      var captionText = document.getElementById("caption");
      captionText.innerHTML = element.alt;
    }

    var mySidebar = document.getElementById("mySidebar");

    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
      } else {
        mySidebar.style.display = 'block';
      }
    }

    function w3_close() {
      mySidebar.style.display = "none";
    }
  </script>
</body>

</html>