<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicación de eventos Puebla</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        #content {
            padding: 40px;
            width: 100%;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 1rem;
            color: #333;
        }

        input[type="text"], input[type="date"], input[type="time"], input[type="file"], select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus, input[type="date"]:focus, input[type="time"]:focus, select:focus {
            border-color: #2980b9;
            outline: none;
            background-color: #fff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #2980b9;
            color: white;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }

        .regresar-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 15px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .regresar-btn:hover {
            background-color: #e67e22;
        }
    </style>
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
                    echo "<label for='titulo'>Título:</label><input type='text' name='titulo' value='" . htmlspecialchars($ren['titulo']) . "' required><br>";
                    echo "<label for='descripcion'>Descripción:</label><input type='text' name='descripcion' value='" . htmlspecialchars($ren['descripcion']) . "' required><br>";
                    echo "<label for='fecha_evento'>Fecha del evento:</label><input type='date' name='fecha_evento' value='" . htmlspecialchars($ren['fecha_evento']) . "' required><br>";
                    echo "<label for='hora_evento'>Hora del evento:</label><input type='time' name='hora_evento' value='" . htmlspecialchars($ren['hora_evento']) . "' required><br>";
                    echo "<label for='ubicacion'>Ubicación:</label><input type='text' name='ubicacion' value='" . htmlspecialchars($ren['ubicacion']) . "' required><br>";
                    echo "<label for='estado'>Estado:</label><input type='text' name='estado' value='" . htmlspecialchars($ren['estado']) . "' required><br>";
                    echo "<label for='imagen'>Imagen:</label><input type='text' name='imagen' value='" . htmlspecialchars($ren['imagen']) . "' required><br>";
                    echo "<label for='tipo_event'>Tipo de evento:</label><input type='text' name='tipo_event' value='" . htmlspecialchars($ren['tipo_event']) . "' required><br>";
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

<button class="regresar-btn" onclick="window.history.back();">Regresar</button>

</body>
</html>
