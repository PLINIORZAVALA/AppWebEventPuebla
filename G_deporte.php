<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplicacion de eventos puebla</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>Bienvenido Administrador </h1>
  </div>
  <div id="menucontainer">
    <div id="menunav">
    <ul>
        <li><a href="G_conciertos.php"><span>Conciertos</span></a></li>
        <li><a href="G_teatro.php" ><span>Teatros</span></a></li>
        <li><a href="G_deporte.php" class="current"><span>Deportes</span></a></li>
        <li><a href="G_familiares.php"><span>Familiares</span></a></li>
        <li><a href="G_especiales.php"><span>Especiales</span></a></li>
        <li><a href="G_todos.php"><span>Todos</span></a></li>
        <li><a href="G_altaRegistro.php"><span>Permiso Eventos</span></a></li>
        <li><a href="G_users.php"><span>Usuarios</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Deporte</h3>
      <p>&nbsp;</p>
      <p></p>

      <?php
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $resultado = mysqli_query($link, "SELECT * FROM eventos WHERE tipo_event = 'deportes'");
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

        // Mostrar los datos en formato de tarjeta
        echo "<h2>Vista de Tarjetas de Eventos</h2>";

        mysqli_data_seek($resultado, 0); // Reiniciar puntero para reutilizar el resultado en el formato de tarjetas

        while ($ren = mysqli_fetch_array($resultado)) {
            $id_event = $ren['id_event'];
            $titulo = $ren['titulo'];
            $descripcion = $ren['descripcion'];
            $fecha_evento = $ren['fecha_evento'];
            $hora_evento = $ren['hora_evento'];
            $ubicacion = $ren['ubicacion'];
            $imagen = $ren['imagen'];
            $tipo_event = $ren['tipo_event'];
            
            echo "<div class='event-card' style='border: 1px solid #ddd; padding: 10px; width: 200px; margin: 10px; display: inline-block; text-align: center;'>";
            echo "<img src='MisImagenes/$imagen' alt='Imagen del evento' style='width: 175px; height: 150px;'>";
            echo "<div class='event-info'>";
            echo "<p class='event-title' style='font-weight: bold;'>$titulo</p>";
            echo "<p class='event-description'>$descripcion</p>";
            echo "<p class='event-date'>$fecha_evento a las $hora_evento</p>";
            echo "<p class='event-location'>Ubicación: $ubicacion</p>";
            echo "<p class='event-category'>Categoría: $tipo_event</p>";
            echo "</div>";
            echo "</div>";
        }

        mysqli_close($link);
      ?>




      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>.</p>
    </div>
    </div>
  <div id="footer"> <a href="#">Registrase</a> | <a href="mailto:denise@mitchinson.net">Iniciar Sesión</a> | <a href="http://validator.w3.org/check?uri=referer">html</a> | <a href="http://jigsaw.w3.org/css-validator">css</a> | &copy; 2007 Anyone | Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a></div>
</div>
</body>
</html>