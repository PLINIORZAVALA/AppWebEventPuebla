<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
    <h1>Eventos Puebla </h1>
    <h2><a href="registro.php">Registrarse</a> | <a href="sesion.php">Iniciar Sesión</a> </h2>
  </div>
  <div id="menucontainer">
    <div id="menunav">
    <ul>
        <li><a href="F_conciertos.php"><span>Conciertos</span></a></li>
        <li><a href="F_teatro.php" ><span>Teatros</span></a></li>
        <li><a href="F_deporte.php"><span>Deportes</span></a></li>
        <li><a href="F_familiares.php"><span>Familiares</span></a></li>
        <li><a href="F_especiales.php"><span>Especiales</span></a></li>
        <li><a href="F_todos.php" class="current"><span>Todos</span></a></li>
        
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Bienvenido internauta</h3>
      <p>&nbsp;</p>
      <p></p>

      <?php
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $resultado = mysqli_query($link, "SELECT * FROM eventos WHERE estado = 'aprobado'");
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

    

        while ($ren = mysqli_fetch_array($resultado)) {
            $id_event = $ren['id_event'];
            $titulo = $ren['titulo'];
            $descripcion = $ren['descripcion'];
            $fecha_evento = $ren['fecha_evento'];
            $hora_evento = $ren['hora_evento'];
            $ubicacion = $ren['ubicacion'];
            $id_usuario = $ren['id_usuario'];
            $estado = $ren['estado'];
            $fecha_creacion = $ren['fecha_creacion'];
            $tipo_event = $ren['tipo_event'];
            $imagen = $ren['imagen'];

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
            
            echo "<div class='event-card' style='border: 1px solid #ddd; padding: 10px; width: 200px; margin: 10px; display: inline-block; text-align: center;'>";
            echo "<img src='MisImagenes/$imagen' alt='Imagen del evento' style='width: 100%; height: auto;'>";
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
    
  </div>
</body>
</html>