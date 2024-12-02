<?php
session_start();  // Iniciar la sesión

// Comprobar si el usuario ha iniciado sesión
$is_logged_in = isset($_SESSION['id_usuario']); // Se asume 'id_usuario' como indicador de inicio de sesión
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplicacion de eventos puebla</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
    /* Estilo de los botones de compartición */
    .social-share {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .social-share a {
        display: inline-block;
        padding: 5px 3px;
        margin: 5px;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
        font-weight: bold;
        text-align: center;
    }

    .social-share a:hover {
        background-color: #0056b3;
    }

    /* Colores específicos para cada red social */
    .facebook {
        background-color: #3b5998;
    }

    .whatsapp {
        background-color: #25D366;
    }

    .twitter {
        background-color: #1DA1F2;
    }

    .instagram {
        background-color: #E4405F;
    }
</style>
</head>
<body>
<div id="wrap">
  <div id="masthead">
  <?php if ($is_logged_in): ?>
        <a href="indexCliente.php"><h1>Eventos Puebla</h1></a>
      <?php else: ?>
        <a href="index.php"><h1>Eventos Puebla</h1></a>
      <?php endif; ?>
    <h2>
      <?php if ($is_logged_in): ?>
        <a href="Salir.php">Cerrar sesión</a>
      <?php else: ?>
        <a href="registro.php">Registrarse</a> | <a href="sesion.php">Iniciar Sesión</a>
      <?php endif; ?>
    </h2>
  </div>
  <div id="menucontainer">
    <div id="menunav">
      <ul>
        <li><a href="F_conciertos.php"><span>Conciertos</span></a></li>
        <li><a href="F_teatro.php"><span>Teatros</span></a></li>
        <li><a href="F_deporte.php" ><span>Deportes</span></a></li>
        <li><a href="F_familiares.php"><span>Familiares</span></a></li>
        <li><a href="F_especiales.php"><span>Especiales</span></a></li>
        <li><a href="F_todos.php"class="current"><span>Todos</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Todos los eventos</h3>
      <p>&nbsp;</p>
      <p></p>

      <?php
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $resultado = mysqli_query($link, "SELECT * FROM eventos WHERE  estado = 'aprobado'");
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

        // Mostrar eventos como tarjetas
        echo "<h2>Vista de Tarjetas de Eventos</h2>";

    
        while ($ren = mysqli_fetch_array($resultado)) {
          $id_event = $ren['id_event'];
          $titulo = $ren['titulo'];
          $descripcion = $ren['descripcion'];
          $fecha_evento = $ren['fecha_evento'];
          $hora_evento = $ren['hora_evento'];
          $ubicacion = $ren['ubicacion'];
          $imagen = $ren['imagen'];
          $tipo_event = $ren['tipo_event'];

          // URL para compartir el evento
          $evento_url = "http://tusitio.com/detalleEvento.php?id_event=$id_event";

          // Enlace para ver detalles del evento
          echo "<a href='detalleEvento.php?id_event=$id_event' style='text-decoration: none; color: inherit;'>";
          echo "<div class='event-card' style='border: 1px solid #ddd; padding: 10px; width: 200px; margin: 10px; display: inline-block; text-align: center;'>";
          echo "<img src='MisImagenes/$imagen' alt='Imagen del evento' style='width: 175px; height: 150px;'>";
          echo "<div class='event-info'>";
          echo "<p class='event-title' style='font-weight: bold;'>$titulo</p>";
          echo "<p class='event-description'>$descripcion</p>";
          echo "<p class='event-date'>$fecha_evento a las $hora_evento</p>";
          echo "<p class='event-location'>Ubicación: $ubicacion</p>";
          echo "<p class='event-category'>Categoría: $tipo_event</p>";

          // Agregar botones de compartir
          echo "<div class='social-share'>";
          echo "<a href='https://www.facebook.com/sharer/sharer.php?u=$evento_url' class='facebook' target='_blank'>Facebook</a>";
          echo "<a href='https://api.whatsapp.com/send?text=$evento_url' class='whatsapp' target='_blank'>WhatsApp</a>";
          echo "<a href='https://twitter.com/intent/tweet?url=$evento_url&text=¡Mira este evento!&hashtags=EventosPuebla' class='twitter' target='_blank'>Twitter</a>";
          echo "<a href='https://www.instagram.com/?url=$evento_url' class='instagram' target='_blank'>Instagram</a>";
          echo "</div>"; // Cierra social-share

          echo "</div>";
          echo "</div>";
          echo "</a>";
      }

        mysqli_close($link);
      ?>
    </div>
  </div>
  <div id="footer">
        <?php if ($is_logged_in): ?>
            <a href="registroEvento.php">Registrar Evento</a>
            <a href="elimEventoOrg.php">Tus eventos</a>
        <?php else: ?>
            <a href="registro.php">Registrarse</a> | <a href="sesion.php">Iniciar Sesión</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
