<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once('conexion.php');

function checkSessionAndRedirect() {
    global $headers;
    $headers = []; // Reiniciar el array de headers

    if (!isset($_SESSION['username'])) {
        headerMock("Location: login.php");
        exit();
    }
}

function headerMock($location) {
    global $headers;
    $headers[] = $location;
}

// Si se está ejecutando el script normalmente, no en modo prueba
if (php_sapi_name() !== 'cli') {
    checkSessionAndRedirect();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tomorroland</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- ENCABEZADO -->
    <section class="encabezado">
      <div class="imgTomorrow">
        <div class="enlace">
          <a href="https://www.tomorrowland.com/h" target="_blank">
            WELCOME TO TOMORROLAND</a>
        </div>
      </div>
    </section>
    <!-- TICKETS -->
    <section class="ticket">
      <h1>TICKETS</h1>
      <div class="semana1">
        <h1>WEEKEND 1</h1>
        <h2>21 - 23 Julio 2023</h2>
      </div>
      <div class="semana2">
        <h1>WEEKEND 2</h1>
        <h2>28 - 30 Julio 2013</h2>
      </div>
      <div class="clearfix"></div>
      <br /><br />
      <div class="global">
        <h2><b>PAQUETES DE VIAJE GLOBAL</b></h2>
        <img style="width: 310px; height: 280px;" src="imagenes/venta1.jpg" alt="" />
        <p>
          Sábado 21 de enero de 2023 - 17:00 EC <br /><br />
          <b>Precio : $800</b> <a href="crud.php" target="_blank"><button>Comprar</button></a>
        </p>
      </div>
      <div class="preventa">
        <h2><b>PREVENTA MUNDIAL</b></h2>
        <img style="width: 310px; height: 280px;" src="imagenes/venta2.webp" alt="" />
        <p>
          Sábado 28 de enero de 2023 - 17:00 CEC <br /><br /><b>Precio $750</b><button>Comprar</button>
        </p>
      </div>
      <div class="ventaMundial">
        <h2><b></b>VENTA EN TODO EL MUNDO</b></h2>
        <img style="width: 310px; height: 280px;" src="imagenes/venta3.jpg" alt="" />
        <p>
          Sábado 4 de febrero de 2023 - 17:00 EC <br /><br />
          <b>Individual: $850</b> <button>Comprar</button>
        </p>
      </div>
      <div class="clearfix"></div>
      <br />
    </section>
    <!-- REDES SOCIALES -->
    <section class="sociales">
      <h1>CONTACTOS</h1>
      <div class="container">
        <ul class="social-link text-centro">
          <li><a href="" target="_blank"><img width="50" height="50" src="imagenes/facebook.png" alt="facebook-new"/></a></li>
          <li><a href="https://instagram.com" target="_blank"> <img src="imagenes/instagram.png" width="50" height="50" alt="instagram"></a></li>
          <li><a href="https://twitter.com" target="_blank"> <img width="50" height="50" src="imagenes/twitter.png" alt="twitter--v1"/></a></li>
          <li><a href="https://gmaill.com" target="_blank"> <img width="50" height="50" src="imagenes/gmail.png" alt="twitter--v1"/></a></li>
          <li><a href="https://web.whatsapp.com/" target="_blank"> <img width="50" height="50" src="imagenes/whatsapp.png" alt="twitter--v1"/></a></li>
          <li><a href="https://goo.gl/maps/poEp62FxtQE6nLgK7" target="_blank"> <img width="50" height="50" src="imagenes/mapa.png" alt="twitter--v1"/></a></li>
        </ul>
      </div>  
      <div class="clearfix"></div>
    </section>
    <!--Footer-->
    <section class="footer">
      <div class="container">
        <p class="text-centro">Todos los derechos Reservados (2023 - 2026). Diseñado por <a href="#" class="autor">David Claudio</a>.</p>
      </div>
    </section>
  </body>
</html>
