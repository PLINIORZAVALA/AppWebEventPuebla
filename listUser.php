<html>
<head>
    <title>Consulta de Usuarios</title>
</head>
<body>
    <h2>Lista de Usuarios</h2>
    <hr>
    <?php
    $link = mysqli_connect("localhost", "root", "", "event");
    if (!$link) {
        die('Error de conexión: ' . mysqli_connect_error());
    }

    $resultado = mysqli_query($link, "SELECT * FROM usuarios");
    if (!$resultado) {
        die('Error en la consulta: ' . mysqli_error($link));
    }

    echo "<table border='1'>";
    echo "<tr>
            <th>ID Usuario</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Tipo de Usuario</th>
            <th>Fecha de Registro</th>
          </tr>";

    while ($reg = mysqli_fetch_array($resultado)) {
        $id_usuario = $reg['id_usuario'];
        $nombre = $reg['nombre'];
        $email = $reg['email'];
        $contrasena = $reg['contrasena'];
        $tipo_usuario = $reg['tipo_usuario'];
        $fecha_registro = $reg['fecha_registro'];

        echo "<tr>";
        echo "<td>$id_usuario</td>
              <td>$nombre</td>
              <td>$email</td>
              <td>$contrasena</td>
              <td>$tipo_usuario</td>
              <td>$fecha_registro</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($link);
    ?>
</body>
</html>
