<?php
// Conectar a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Obtener el id del evento desde la URL
$id_event = isset($_GET['id_event']) ? intval($_GET['id_event']) : 0;

if ($id_event > 0) {
    // Consultar detalles del evento
    $query = "SELECT * FROM eventos WHERE id_event = $id_event";
    $resultado = mysqli_query($link, $query);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $evento = mysqli_fetch_assoc($resultado);

        echo "<h1>" . htmlspecialchars($evento['titulo']) . "</h1>";
        echo "<img src='MisImagenes/" . htmlspecialchars($evento['imagen']) . "' alt='Imagen del evento' style='width: 300px; height: auto;'>";
        echo "<p><strong>Descripción:</strong> " . htmlspecialchars($evento['descripcion']) . "</p>";
        echo "<p><strong>Fecha:</strong> " . htmlspecialchars($evento['fecha_evento']) . "</p>";
        echo "<p><strong>Hora:</strong> " . htmlspecialchars($evento['hora_evento']) . "</p>";
        echo "<p><strong>Ubicación:</strong> " . htmlspecialchars($evento['ubicacion']) . "</p>";
        echo "<p><strong>Categoría:</strong> " . htmlspecialchars($evento['tipo_event']) . "</p>";
    } else {
        echo "<p>Evento no encontrado.</p>";
    }
} else {
    echo "<p>ID de evento inválido.</p>";
}

mysqli_close($link);
?>
