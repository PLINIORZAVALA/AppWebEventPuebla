<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Concierto</title>
</head>
<body>
<?php 
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar que el ID esté en la URL
if (isset($_GET['id_event']) && is_numeric($_GET['id_event'])) {
    $id = (int) $_GET['id_event'];  // Convertir a entero para seguridad

    // Ejecutar la consulta de eliminación
    $query = "DELETE FROM eventos WHERE id_event = '$id'";
    if (mysqli_query($link, $query)) {
        // Redirigir después de la eliminación
        header("Location: elimEventoAB.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($link);
    }
} else {
    echo "ID de evento no válido.";
}

// Cerrar la conexión
mysqli_close($link);
?>
</body>
</html>
