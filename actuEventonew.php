<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación de eventos Puebla</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="wrap">

    <div id="container">
        <div id="content">

            <?php
                // Conexión a la base de datos
                $link = mysqli_connect("localhost", "root", "", "event");

                if (!$link) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                // Obteniendo el ID de evento desde la URL de forma segura
                $id = isset($_GET['id_event']) ? (int) $_GET['id_event'] : 0;

                // Preparar y ejecutar consulta segura
                $stmt = mysqli_prepare($link, "SELECT titulo, descripcion, fecha_evento, hora_evento, ubicacion, estado, imagen, tipo_event FROM eventos WHERE id_event = ?");
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Verificar si se obtuvo un resultado
                if ($ren = mysqli_fetch_assoc($result)) {
                    echo '<form method="POST" action="actuEvento2.php">';
                    echo "Título: <input type='text' name='titulo' value='" . htmlspecialchars($ren['titulo']) . "' size='50'><br>";
                    echo "Descripción: <input type='text' name='descripcion' value='" . htmlspecialchars($ren['descripcion']) . "' size='50'><br>";
                    echo "Fecha del evento: <input type='text' name='fecha_evento' value='" . htmlspecialchars($ren['fecha_evento']) . "' size='50'><br>";
                    echo "Hora del evento: <input type='text' name='hora_evento' value='" . htmlspecialchars($ren['hora_evento']) . "' size='50'><br>";
                    echo "Ubicación: <input type='text' name='ubicacion' value='" . htmlspecialchars($ren['ubicacion']) . "' size='50'><br>";
                    echo "Estado: <input type='text' name='estado' value='" . htmlspecialchars($ren['estado']) . "' size='50'><br>";
                    echo "Imagen: <input type='text' name='imagen' value='" . htmlspecialchars($ren['imagen']) . "' size='50'><br>";
                    echo "Tipo de evento: <input type='text' name='tipo_event' value='" . htmlspecialchars($ren['tipo_event']) . "' size='50'><br>";
                    echo "<input type='hidden' name='id_event' value='$id'>";
                    echo "<input type='submit' value='Actualizar'>";
                    echo '</form>';
                } else {
                    echo "No se encontró el evento.";
                }

                mysqli_stmt_close($stmt);
                mysqli_close($link);
            ?>

        </div>
    </div>
</div>

</body>
</html>
