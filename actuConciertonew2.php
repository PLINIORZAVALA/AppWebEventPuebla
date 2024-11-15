<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Concierto</title>
</head>
<body>

<?php
// Conexión a la base de datos
$link = mysqli_connect("localhost", "root", "", "event");

if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario de manera segura
$titulo = mysqli_real_escape_string($link, $_POST['titulo']);
$descripcion = mysqli_real_escape_string($link, $_POST['descripcion']);
$fecha_evento = mysqli_real_escape_string($link, $_POST['fecha_evento']);
$hora_evento = mysqli_real_escape_string($link, $_POST['hora_evento']);
$ubicacion = mysqli_real_escape_string($link, $_POST['ubicacion']);
$estado = mysqli_real_escape_string($link, $_POST['estado']);
$imagen = mysqli_real_escape_string($link, $_POST['imagen']);
$tipo_event = mysqli_real_escape_string($link, $_POST['tipo_event']);
$id = (int) $_POST['id_event'];  // Aseguramos que el ID sea un número entero

// Realizar la actualización en la base de datos
$query = "UPDATE eventos SET 
    titulo = '$titulo',
    descripcion = '$descripcion',
    fecha_evento = '$fecha_evento',
    hora_evento = '$hora_evento',
    ubicacion = '$ubicacion',
    estado = '$estado',
    imagen = '$imagen',
    tipo_event = '$tipo_event' 
WHERE id_event = '$id'";

if (mysqli_query($link, $query)) {
    // Redirigir al usuario a otra página después de la actualización
    header("Location: elimConciertosAB.php");
    exit();  // Importante para detener el script después de la redirección
} else {
    echo "Error al actualizar el registro: " . mysqli_error($link);
}

// Cerrar la conexión
mysqli_close($link);
?>

</body>
</html>
