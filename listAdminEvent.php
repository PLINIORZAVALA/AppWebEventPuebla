<html>
<head>
    <title>Consulta de Administración de Eventos</title>
</head>
<body>
    <h2>Lista de Administración de Eventos</h2>
    <hr>
    <?php
    $link = mysqli_connect("localhost", "root", "", "event");
    if (!$link) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $resultado = mysqli_query($link, "SELECT * FROM administracion_eventos");
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($link));
    }

    echo "<table border='1'>";
    echo "<tr>
            <th>ID Administración</th>
            <th>ID Evento</th>
            <th>ID Administrador</th>
            <th>Estado</th>
            <th>Fecha de Revisión</th>
            <th>Comentario del Administrador</th>
          </tr>";

    while ($reg = mysqli_fetch_array($resultado)) {
        $id_adm = $reg['id_administracion'];
        $id_ev = $reg['id_evento'];
        $id_admin = $reg['id_user'];
        $estado = $reg['estado'];
        $fecha_rev = $reg['fecha_revision'];
        $comentario = $reg['comentario_admin'];

        echo "<tr>";
        echo "<td>$id_adm</td>
              <td>$id_ev</td>
              <td>$id_admin</td>
              <td>$estado</td>
              <td>$fecha_rev</td>
              <td>$comentario</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($link);
    ?>
</body>
</html>
