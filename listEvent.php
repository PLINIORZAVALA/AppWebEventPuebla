<html>
<head>
    <title>Consulta de eventos</title>
</head>
<body>
    <h2>Lista de datos del evento</h2>
    <hr>
    <?php
    $link = mysqli_connect("localhost", "root", "", "event");
    if (!$link) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $resultado = mysqli_query($link, "SELECT * FROM eventos");
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($link));
    }

    echo "<table border='1'>";
    echo "<tr>
            <th>ID_event</th>
            <th>titulo</th>
            <th>Descripcion</th>
            <th>fecha_evento</th>
            <th>hora_evento</th>
            <th>ubicacion</th>
            <th>id_organizador</th>
            <th>estado</th>
            <th>fecha_creacion</th>
            <th>tipo_evento</th>
            <th>imagen</th>
          </tr>";

    while ($reg = mysqli_fetch_array($resultado)) {
        $id_E = $reg['id_event'];
        $ti = $reg['titulo'];
        $des = $reg['descripcion'];
        $fechEv = $reg['fecha_evento'];
        $hoEv = $reg['hora_evento'];
        $ubi = $reg['ubicacion'];
        $id_O = $reg['id_usuario'];
        $est = $reg['estado'];
        $fechC = $reg['fecha_creacion'];
        $tiE = $reg['tipo_event'];
        $img = $reg['imagen'];

        echo "<tr>";
        echo "<td>$id_E</td>
              <td>$ti</td>
              <td>$des</td>
              <td>$fechEv</td>
              <td>$hoEv</td>
              <td>$ubi</td>
              <td>$id_O</td>
              <td>$est</td>
              <td>$fechC</td>
              <td>$tiE</td>";
        echo "<td><a href='detalles.php?id_event=$id_E'><img src='MisImage/$img' width='70' height='70'></a></td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($link);
    ?>
</body>
</html>
