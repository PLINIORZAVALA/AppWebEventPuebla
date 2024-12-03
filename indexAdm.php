<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Aplicacion de eventos puebla</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrap">
  <div id="masthead">
  <div id="masthead"> <h1> Bienvenido administrador</h1> </div>
  </div>
  <div id="menucontainer">
    <div id="menunav">
    <ul>
        <li><a href="elimEventoAB.php" class="current"><span>Eventos</span></a></li>
        <li><a href="elimUserAB.php"><span>Usuarios</span></a></li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div id="content">
      <h3>Bienvenido administrador</h3>
      <p>&nbsp;</p>
      <p></p>

      <?php
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        $resultado = mysqli_query($link, "SELECT * FROM eventos");
        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

        // Mostrar datos en una tabla
        echo "<table border='1'>";
        echo "<tr>
                <th>ID Evento</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha del Evento</th>
                <th>Hora del Evento</th>
                <th>Ubicación</th>
                <th>ID Usuario</th>
                <th>Estado</th>
                <th>Fecha de Creación</th>
                <th>Tipo de Evento</th>
                <th>Imagen</th>
              </tr>";

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

            echo "<tr>";
            echo "<td>$id_event</td>
                  <td>$titulo</td>
                  <td>$descripcion</td>
                  <td>$fecha_evento</td>
                  <td>$hora_evento</td>
                  <td>$ubicacion</td>
                  <td>$id_usuario</td>
                  <td>$estado</td>
                  <td>$fecha_creacion</td>
                  <td>$tipo_event</td>";
            echo "<td><a href='detalle_evento.php?id_event=$id_event'><img src='MisImagenes/$imagen' width='70' height='70'></a></td>";
            echo "</tr>";
        }

        echo "</table>";

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
  <div id="footer"> 
    <a href="index.php">Cerrar Sesión</a> 
  </div>

</div>
</body>
</html>
 