<!DOCTYPE html>
<html lang="es">
<head>
    <title>Aplicación de eventos Puebla</title>
    <link href="style1.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script language="JavaScript">
    function confirmSubmit() {
      var eli=confirm("¿Estás seguro de eliminar este registro?");
      if (eli) return true ;
      else return false ;
    }
    </script>
</head>
<body>

<div id="wrap">
  <div id="masthead"> <h1> Bienvenido Orzanizador</h1> </div>
  <div id="container">
    <div id="content">

      <?php
        session_start();  // Iniciar sesión

        // Verificar que el usuario esté logueado
        if (!isset($_SESSION['id_usuario'])) {
            echo "Debes iniciar sesión para acceder a esta página.";
            exit();
        }

        // Obtener el ID del usuario logueado
        $id_usuario_logueado = $_SESSION['id_usuario'];

        // Conectar a la base de datos
        $link = mysqli_connect("localhost", "root", "", "event");

        if (!$link) {
            die('Error de conexión: ' . mysqli_connect_error());
        }

        // Consultar solo los eventos creados por el usuario logueado
        $query = "SELECT * FROM eventos WHERE id_usuario = $id_usuario_logueado";
        $resultado = mysqli_query($link, $query);

        if (!$resultado) {
            die('Error en la consulta: ' . mysqli_error($link));
        }

        echo "<h2>Vista de Tarjetas de tus Eventos</h2>";
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
                <th>Eliminar</th>
                <th>Actualizar</th>
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
            $imagen = $ren['imagen'];
            $tipo_event = $ren['tipo_event'];

            echo "<tr>
                    <td>$id_event</td>
                    <td>$titulo</td>
                    <td>$descripcion</td>
                    <td>$fecha_evento</td>
                    <td>$hora_evento</td>
                    <td>$ubicacion</td>
                    <td>$id_usuario</td>
                    <td>$estado</td>
                    <td>$fecha_creacion</td>
                    <td>$tipo_event</td>
                    <td><a href='detalle_evento.php?id_event=$id_event'><img src='MisImagenes/$imagen' width='70' height='70'></a></td>

                    <td><center>
                    <a onclick=\"return confirmSubmit()\" href=\"elimEventoOrg2 .php?id_event=$id_event\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
		                </center>
                    </td>
                    <td><center>
                    <a href=\"actuEventonewOrg.php?id_event=$id_event\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
                    </center></td>

                  </tr>";
        }

        echo "</table>";

        mysqli_free_result($resultado); 
        mysqli_close($link);
      ?>
    </div>
  </div>
  <div id="footer">  
    <a href="index.php">Cerrar Sesión</a> 
  </div>
</div>
</body>
</html>
